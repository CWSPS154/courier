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

namespace App\Http\Controllers\Customer;

use App\DataTables\Customer\AddressBookDataTable;
use App\Http\Controllers\Controller;
use App\Models\AddressBook;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AddressBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AddressBookDataTable $dataTable
     * @return mixed
     */
    public function index(AddressBookDataTable $dataTable): mixed
    {
        return $dataTable->render('template.customer.address_book.index_address_book');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws ValidationException
     */
    public function store(Request $request): array|RedirectResponse
    {
        $this->validator($request->all())->validate();

        $status = $request->has('status');
        $set_as_default = $request->has('set_as_default');

        if ($set_as_default) {
            AddressBook::where('set_as_default', true)
                ->where('user_id', Auth::id())
                ->update(['set_as_default' => false]);
        }

        try {
            $addressBook = AddressBook::create([
                'user_id' => Auth::id(),
                'company_name' => $request->company_name_address_book,
                'street_address' => $request->street_address_address_book,
                'street_number' => $request->street_number_address_book,
                'suburb' => $request->suburb_address_book,
                'city' => $request->city_address_book,
                'state' => $request->state_address_book,
                'zip' => $request->zip_address_book,
                'country' => $request->country_address_book,
                'place_id' => $request->place_id_address_book,
                'area_id' => $request->area_id,
                'latitude' => $request->latitude_address_book,
                'longitude' => $request->longitude_address_book,
                'location_url' => $request->location_url_address_book,
                'full_json_response' => $request->json_response_address_book,
                'status' => $status,
                'set_as_default' => $set_as_default,
            ]);

            if ($request->wantsJson()) {
                return ['success' => true, 'message' => 'Address is created successfully', 'data' => $addressBook];
            }

            return redirect()->route('address_book.index')->with('success', 'Address is created successfully');
        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                if (config('app.debug')) {
                    return ['success' => false, 'message' => $e->getMessage()];
                }
                return ['success' => false, 'message' => "Something went wrong with the input data"];
            }
            return redirect()->route('address_book.index')->with('error', $e->getMessage());
        }
    }


    /**
     * Validator for validate data in the request.
     *
     * @param array $data The data
     * @param int|string|null $id The identifier for update validation
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     */
    protected function validator(array $data, int|string $id = null)
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
                'company_name_address_book' => ['required'],
                'street_address_address_book' => ['required'],
                'street_number_address_book' => ['required'],
                'suburb_address_book' => ['required'],
                'city_address_book' => ['required'],
                'state_address_book' => ['required'],
                'zip_address_book' => ['required'],
                'country_address_book' => ['required'],
                'place_id_address_book' => ['required'],
                'latitude_address_book' => ['required'],
                'longitude_address_book' => ['required'],
                'location_url_address_book' => ['required'],
                'json_response_address_book' => ['required'],
                'area_id' => ['required'],
            ],
            [
                'company_name_address_book.required' => 'Company name field is required',
                'street_address_address_book.required' => 'Street address field is required',
                'street_number_address_book.required' => 'Street number field is required',
                'suburb_address_book.required' => 'Suburb field is required',
                'city_address_book.required' => 'City field is required',
                'state_address_book.required' => 'State field is required',
                'zip_address_book.required' => 'Zip field is required',
                'country_address_book.required' => 'Country field is required',
                'place_id_address_book.required' => 'Place field is required',
                'latitude_address_book.required' => 'Latitude field is required',
                'longitude_address_book.required' => 'Longitude field is required',
                'location_url_address_book.required' => 'Location url field is required',
                'json_response_address_book.required' => 'Complete json response is required',
                'area_id.required' => 'Area is required',
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws ValidationException
     */
    public function update(Request $request, $addressBook): array|RedirectResponse
    {
        $addressBook = AddressBook::findOrFail($addressBook);
        $this->validator($request->all())->validate();

        $status = $request->has('status');
        $set_as_default = $request->has('set_as_default');

        if ($set_as_default) {
            AddressBook::where('id', '!=', $addressBook->id)
                ->where('set_as_default', true)
                ->where('user_id', Auth::id())
                ->update(['set_as_default' => false]);
        }

        try {
            $addressBook->company_name = $request->company_name_address_book;
            $addressBook->street_address = $request->street_address_address_book;
            $addressBook->street_number = $request->street_number_address_book;
            $addressBook->suburb = $request->suburb_address_book;
            $addressBook->city = $request->city_address_book;
            $addressBook->state = $request->state_address_book;
            $addressBook->zip = $request->zip_address_book;
            $addressBook->country = $request->country_address_book;
            $addressBook->place_id = $request->place_id_address_book;
            $addressBook->area_id = $request->area_id;
            $addressBook->latitude = $request->latitude_address_book;
            $addressBook->longitude = $request->longitude_address_book;
            $addressBook->location_url = $request->location_url_address_book;
            $addressBook->full_json_response = $request->json_response_address_book;
            $addressBook->status = $status;
            $addressBook->set_as_default = $set_as_default;
            $addressBook->save();

            if ($addressBook->wasChanged()) {
                if ($request->wantsJson()) {
                    return ['success' => true, 'message' => 'Address is updated successfully', 'data' => $addressBook];
                }

                $routeName = request()->route()->getName();
                $redirectRoute = $routeName == 'address_book.update' ? 'address_book.index' : back();
                return redirect()->route($redirectRoute)->with('success', 'Address is updated successfully');
            } else {
                if ($request->wantsJson()) {
                    return ['success' => true, 'message' => 'No changes have been made', 'data' => $addressBook];
                }
                return back()->with('info', 'No changes have been made.');
            }
        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                if (config('app.debug')) {
                    return ['success' => false, 'message' => $e->getMessage()];
                }
                return ['success' => false, 'message' => "Something went wrong with the input data"];
            }
            return redirect()->route('address_book.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View|Factory|Application
     */
    public function create(): View|Factory|Application
    {
        return view('template.customer.address_book.create_address_book');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $addressBook
     * @return View|Factory|Application
     */
    public function edit($addressBook): View|Factory|Application
    {
        $addressBook = AddressBook::findOrFail($addressBook);
        if (request()->route()->getName() == 'address_book.edit') {
            return view('template.customer.address_book.edit_address_book', compact('addressBook'));
        } else {
            return view('template.admin.address_book.edit_address_book', compact('addressBook'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AddressBook $addressBook): array|RedirectResponse
    {
        $addressBook->delete();
        if (request()->wantsJson()) {
            return ['success' => true, 'message' => 'Address details deleted successfully'];
        }
        return back()->with('success', 'Address details deleted successfully');
    }
}
