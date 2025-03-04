<?php

/**
 * PHP Version 8.1.11
 * Laravel Framework 9.43.0
 *
 * @category Controller
 *
 * @author CWSPS154 <codewithsps154@gmail.com>
 * @license MIT License https://opensource.org/licenses/MIT
 *
 * @link https://github.com/CWSPS154
 *
 * Date 28/08/22
 * */

namespace App\Http\Controllers\Admin\User;

use App\DataTables\Admin\User\DriverDataTable;
use App\Http\Controllers\Controller;
use App\Models\AddressBook;
use App\Models\Driver;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(DriverDataTable $dataTable)
    {
        return $dataTable->render('template.admin.user.driver.index_driver');
    }

    /**
     * @return JsonResponse|void
     */
    public function getDrivers()
    {
        if (\request()->ajax()) {
            $search = request()->search;
            $id = request()->id;
            $drivers = User::select('id', 'name', 'role_id')->when(
                $search,
                function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                }
            )->when($id, function ($query) use ($id) {
                $query->where('id', $id);
            })->where('role_id', Role::getRoleId(Role::DRIVER))->limit(15)->get();
            $response = [];
            foreach ($drivers as $driver) {
                $response[] = [
                    'id' => $driver->id,
                    'text' => $driver->name,
                ];
            }

            return response()->json($response);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validator($request->all())->validate();
        $request->has('is_active') ? $is_active = true : $is_active = false;
        $request->has('is_company_driver') ? $is_company_driver = true : $is_company_driver = false;
        $user = User::create([

            'name' => $request->first_name.' '.$request->last_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password_confirmation),
            'role_id' => Role::getRoleId(Role::DRIVER),
            'is_active' => $is_active,
        ]);
        $driver = Driver::create([
            'user_id' => $user->id,
            'driver_id' => $request->did,
            'area_id' => $request->area_id,
            'pager_number' => $request->pager_number,
            'company_driver' => $is_company_driver,
            'company_email' => $request->company_email,
        ]);
        $this->addAddress($request->all(), $user->id);
//        $driver->driver_id = $driver->createIncrementDriverId($driver->id);
//        $driver->save();
        return redirect()->route('driver.index')->with('success', 'Driver details is saved successfully');
    }

    /**
     * Validator for validate data in the request.
     *
     * @param  array  $data The data
     * @param  int|null  $id The identifier for update validation
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     **/
    protected function validator(array $data, int|string $id = null, int|string $driver_id = null)
    {
        \Validator::extend(
            'without_spaces',
            function ($attr, $value) {
                return preg_match('/^\S*$/u', $value);
            }
        );

        return Validator::make(
            $data,
            [
                'did' => ['required', 'string', Rule::unique('drivers', 'driver_id')->whereNull('deleted_at')->ignore($driver_id)],
                'first_name' => ['required', 'string', 'max:250'],
                'last_name' => ['required', 'string'],
                'email' => ['required', 'email', Rule::unique('users', 'email')->whereNull('deleted_at')->ignore($id)],
                'mobile' => ['required', Rule::unique('users', 'mobile')->whereNull('deleted_at')->ignore($id)],
                'area_id' => ['required'],
                'street_address_driver' => ['required'],
                'street_number_driver' => ['required'],
                'suburb_driver' => ['required'],
                'city_driver' => ['required'],
                'state_driver' => ['required'],
                'zip_driver' => ['required'],
                'country_driver' => ['required'],
                'place_id_driver' => ['required'],
                'latitude_driver' => ['required'],
                'longitude_driver' => ['required'],
                'location_url_driver' => ['required'],
                'json_response_driver' => ['required'],
                'is_company_driver' => ['filled'],
                'company_email' => ['nullable', 'email'],
                'password' => ['sometimes', 'nullable', 'confirmed', 'min:8'],
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('template.admin.user.driver.create_driver');
    }

    /**
     * @param  null  $user_id
     */
    private function addAddress($address, $user_id = null, bool $update = false): AddressBook
    {
        if (! $update) {
            return AddressBook::create([
                'user_id' => $user_id,
                'street_address' => $address['street_address_'.'driver'],
                'street_number' => $address['street_number_'.'driver'],
                'suburb' => $address['suburb_'.'driver'],
                'city' => $address['city_'.'driver'],
                'state' => $address['state_'.'driver'],
                'zip' => $address['zip_'.'driver'],
                'country' => $address['country_'.'driver'],
                'place_id' => $address['place_id_'.'driver'],
                'area_id' => $address['area_id'],
                'latitude' => $address['latitude_'.'driver'],
                'longitude' => $address['longitude_'.'driver'],
                'location_url' => $address['location_url_'.'driver'],
                'full_json_response' => $address['json_response_'.'driver'],
                'status' => true,
                'set_as_default' => true,
            ]);
        } else {
            $editAddress = AddressBook::findOrFail($user_id->defaultAddress->id);
            $editAddress->street_address = $address['street_address_'.'driver'];
            $editAddress->street_number = $address['street_number_'.'driver'];
            $editAddress->suburb = $address['suburb_'.'driver'];
            $editAddress->city = $address['city_'.'driver'];
            $editAddress->state = $address['state_'.'driver'];
            $editAddress->zip = $address['zip_'.'driver'];
            $editAddress->country = $address['country_'.'driver'];
            $editAddress->place_id = $address['place_id_'.'driver'];
            $editAddress->area_id = $address['area_id'];
            $editAddress->latitude = $address['latitude_'.'driver'];
            $editAddress->longitude = $address['longitude_'.'driver'];
            $editAddress->location_url = $address['location_url_'.'driver'];
            $editAddress->full_json_response = $address['json_response_'.'driver'];
            $editAddress->save();

            return $editAddress;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function edit(User $driver)
    {
        return view('template.admin.user.driver.edit_driver', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws ValidationException
     */
    public function update(Request $request, User $driver): RedirectResponse
    {
        $this->validator($request->all(), $driver->id, $driver->driver->id)->validate();
        $request->has('is_active') ? $is_active = true : $is_active = false;
        $request->has('is_company_driver') ? $is_company_driver = true : $is_company_driver = false;
        $driver->name = $request->first_name.' '.$request->last_name;
        $driver->first_name = $request->first_name;
        $driver->last_name = $request->last_name;
        $driver->email = $request->email;
        $driver->mobile = $request->mobile;
        if ($request->password_confirmation) {
            $driver->password = Hash::make($request->password_confirmation);
        }
        $driver->is_active = $is_active;
        $driver_table = Driver::findOrFail($driver->driver->id);
        $driver_table->driver_id = $request->did;
        $driver_table->area_id = $request->area_id;
        $driver_table->pager_number = $request->pager_number;
        $driver_table->company_driver = $is_company_driver;
        $driver_table->company_email = $request->company_email;
        $address = $this->addAddress($request->all(), $driver, true);
        $driver->save();
        $driver_table->save();
        if ($driver->wasChanged() || $driver_table->wasChanged() || $address->wasChanged()) {
            return redirect()->route('driver.index')->with('success', 'Driver details updated successfully');
        }

        return back()->with('info', 'No changes have made.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $driver): RedirectResponse
    {
        try {
            $driver->delete();

            return back()->with('success', 'Driver details deleted successfully');
        } catch (QueryException $e) {
            return back()->with(
                'error',
                'You Can not delete this driver due  to data integrity violation, Error:'.$e->getMessage()
            );
        }
    }
}
