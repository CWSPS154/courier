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

use App\DataTables\Admin\User\CustomerDataTable;
use App\Http\Controllers\Controller;
use App\Models\AddressBook;
use App\Models\Customer;
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

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|JsonResponse
     */
    public function index(CustomerDataTable $dataTable)
    {
        return $dataTable->render('template.admin.user.customer.index_customer');
    }

    /**
     * @return JsonResponse|void
     */
    public function getCustomers()
    {
        if (\request()->ajax()) {
            $search = request()->search;
            $id = request()->id;
            $customers = User::with('customer:company_name,user_id,customer_id')->select('id', 'name', 'role_id')
                ->WhereHas('customer', function ($query) use ($search) {
                    $query->when($search, function ($q) use ($search) {
                        $q->where('company_name', 'like', '%'.$search.'%')
                            ->oRwhere('customer_id', 'like', '%'.$search.'%');
                    });
                })->when($id, function ($query) use ($id) {
                    $query->where('id', $id);
                })->where('role_id', Role::getRoleId(Role::CUSTOMER))->where('is_active', true)->limit(15)->get();
            $response = [];
            foreach ($customers as $customer) {
                $response[] = [
                    'id' => $customer->id,
                    'text' => $customer->customer->customer_id.' - '.$customer->customer->company_name,
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
        $user = User::create([
            'name' => $request->first_name.' '.$request->last_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password_confirmation),
            'role_id' => Role::getRoleId(Role::CUSTOMER),
            'is_active' => $is_active,
        ]);
        $customer = Customer::create([
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'customer_id' => $request->cid,
            'area_id' => $request->area_id,
        ]);
        $this->addAddress($request->all(), $user->id);

        return redirect()->route('customer.index')->with('success', 'Customer details is saved successfully');
    }

    /**
     * Validator for validate data in the request.
     *
     * @param  array  $data The data
     * @param  int|null  $id The identifier for update validation
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     **/
    protected function validator(array $data, int|string $id = null, int|string $customer_id = null)
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
                'cid' => ['required', 'string', Rule::unique('customers', 'customer_id')->whereNull('deleted_at')->ignore($customer_id)],
                'company_name' => ['required', 'string', 'max:250', Rule::unique('customers', 'company_name')->whereNull('deleted_at')->ignore($customer_id)],
                'first_name' => ['required', 'string', 'max:250'],
                'last_name' => ['required', 'string'],
                'email' => ['required', 'email', Rule::unique('users', 'email')->whereNull('deleted_at')->ignore($id)],
                'area_id' => ['required'],
                'street_address_customer' => ['required'],
                'street_number_customer' => ['required'],
                'suburb_customer' => ['required'],
                'city_customer' => ['required'],
                'zip_customer' => ['required'],
                'country_customer' => ['required'],
                'place_id_customer' => ['required'],
                'latitude_customer' => ['required'],
                'longitude_customer' => ['required'],
                'location_url_customer' => ['required'],
                'json_response_customer' => ['required'],
                'password' => ['sometimes', 'nullable', 'confirmed', 'min:8'],
            ]
        );
    }

    /**
     * Show the form for create dashboard a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('template.admin.user.customer.create_customer');
    }

    private function addAddress($address, $user_id = null, bool $update = false): AddressBook
    {
        if (! $update) {
            return AddressBook::create([
                'user_id' => $user_id,
                'company_name' => $address['company_name'],
                'street_address' => $address['street_address_'.'customer'],
                'street_number' => $address['street_number_'.'customer'],
                'suburb' => $address['suburb_'.'customer'],
                'city' => $address['city_'.'customer'],
                'state' => $address['state_'.'customer'],
                'zip' => $address['zip_'.'customer'],
                'country' => $address['country_'.'customer'],
                'place_id' => $address['place_id_'.'customer'],
                'area_id' => $address['area_id'],
                'latitude' => $address['latitude_'.'customer'],
                'longitude' => $address['longitude_'.'customer'],
                'location_url' => $address['location_url_'.'customer'],
                'full_json_response' => $address['json_response_'.'customer'],
                'status' => true,
                'set_as_default' => true,
            ]);
        } else {
            $editAddress = AddressBook::findOrFail($user_id->defaultAddress->id);
            $editAddress->company_name = $address['company_name'];
            $editAddress->street_address = $address['street_address_'.'customer'];
            $editAddress->street_number = $address['street_number_'.'customer'];
            $editAddress->suburb = $address['suburb_'.'customer'];
            $editAddress->city = $address['city_'.'customer'];
            $editAddress->state = $address['state_'.'customer'];
            $editAddress->zip = $address['zip_'.'customer'];
            $editAddress->country = $address['country_'.'customer'];
            $editAddress->place_id = $address['place_id_'.'customer'];
            $editAddress->area_id = $address['area_id'];
            $editAddress->latitude = $address['latitude_'.'customer'];
            $editAddress->longitude = $address['longitude_'.'customer'];
            $editAddress->location_url = $address['location_url_'.'customer'];
            $editAddress->full_json_response = $address['json_response_'.'customer'];
            $editAddress->save();

            return $editAddress;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function edit(User $customer)
    {
        return view('template.admin.user.customer.edit_customer', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws ValidationException
     */
    public function update(Request $request, User $customer): RedirectResponse
    {
        $this->validator($request->all(), $customer->id, $customer->customer->id)->validate();
        $request->has('is_active') ? $is_active = true : $is_active = false;
        $customer->name = $request->first_name.' '.$request->last_name;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;
        if ($request->password_confirmation) {
            $customer->password = Hash::make($request->password_confirmation);
        }
        $customer->is_active = $is_active;
        $customer_table = Customer::findOrFail($customer->customer->id);
        $customer_table->customer_id = $request->cid;
        $customer_table->area_id = $request->area_id;
        $address = $this->addAddress($request->all(), $customer, true);
        $customer->save();
        $customer_table->save();
        if ($customer->wasChanged() || $customer_table->wasChanged() || $address->wasChanged()) {
            return redirect()->route('customer.index')->with('success', 'Customer details updated successfully');
        }

        return back()->with('info', 'No changes have made.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $customer): RedirectResponse
    {
        try {
            $customer->delete();

            return back()->with('success', 'Customer details deleted successfully');
        } catch (QueryException $e) {
            return back()->with(
                'error',
                'You Can not delete this customer due  to data integrity violation, Error:'.$e->getMessage()
            );
        }
    }
}
