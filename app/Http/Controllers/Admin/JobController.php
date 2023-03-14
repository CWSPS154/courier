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

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\Job\CompletedJobDataTable;
use App\DataTables\Admin\Job\JobDataTable;
use App\Events\Admin\JobAssignedEvent;
use App\Http\Controllers\Controller;
use App\Models\AddressBook;
use App\Models\CustomerContact;
use App\Models\DailyJob;
use App\Models\JobAddress;
use App\Models\JobAssign;
use App\Models\JobStatus;
use App\Models\JobStatusHistory;
use App\Models\OrderJob;
use App\Models\User;
use DB;
use Helper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(JobDataTable $dataTable)
    {
        return $dataTable->render('template.admin.job.index_job');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function completed(CompletedJobDataTable $dataTable)
    {
        return $dataTable->render('template.admin.job.index_job');
    }

    /**
     * @return JsonResponse|Collection
     */
    public function getAddress(Request $request)
    {
        if ($request->ajax()) {
            if ($request->search) {
                $search = $request->search;
                $id = $request->id;
                $id = $id ?: Auth::id();
                $addressBooks = AddressBook::when(
                    $search,
                    function ($query) use ($search) {
                        $query->where('company_name', 'like', '%'.$search.'%');
                    }
                )->where('user_id', $id)->limit(15)->get();
                $response = [];
                foreach ($addressBooks as $addressBook) {
                    $response[] = [
                        'id' => $addressBook->id,
                        'text' => $addressBook->company_name,
                    ];
                }

                return response()->json($response);
            }
            if ($request->user_id && ! $request->company_name) {
                $user = User::with('defaultAddress', 'customer:company_name,user_id,id,area_id', 'customer.area')
                    ->findOrFail($request->user_id);
                $data = collect($user->defaultAddress);
                $data->push(['customer_name' => $user->customer->company_name]);

                return $data->push(['area' => $user->customer->area]);
            }
            if ($request->company_name && $request->user_id) {
                return AddressBook::where('company_name', $request->company_name)->where('user_id', $request->user_id)->latest()->first();
            }
            if ($request->id) {
                return AddressBook::findOrFail($request->id);
            }
        }
    }

    /**
     * @return JsonResponse|void
     */
    public function getCustomerContact()
    {
        if (\request()->ajax()) {
            $search = request()->search;
            $id = request()->id;
            $customerContacts = CustomerContact::when(
                $search,
                function ($query) use ($search) {
                    $query->where('customer_contact', 'like', '%'.$search.'%');
                }
            )->when($id, function ($query) use ($id) {
                $query->where('user_id', $id);
            })->limit(15)->get();
            $response = [];
            foreach ($customerContacts as $customerContact) {
                $response[] = [
                    'id' => $customerContact->id,
                    'text' => $customerContact->customer_contact,
                ];
            }

            return response()->json($response);
        }
    }

    /**
     * @return void
     */
    public function getAddressBook(Request $request)
    {
        if ($request->ajax()) {
            return Helper::getAddressBook($request->user_id);
        }
    }

    /**
     * @return RedirectResponse|void
     */
    public function assignDriver(Request $request)
    {
        if (\App\Helpers\Helper::isJSON($request->order_job_id)) {
            $order_job_ids = json_decode($request->order_job_id, true);
            if (is_array($order_job_ids)) {
                foreach ($order_job_ids as $order_job_id) {
                    $daily_job = DailyJob::where('order_job_id', $order_job_id)->first();
                    $order_job = OrderJob::findOrFail($order_job_id);
                    $jobAssign = JobAssign::where('order_job_id', $order_job_id)->first();
                    if (end($order_job_ids)) {
                    }
                    if ($jobAssign) {
                        if ($jobAssign->user_id != $request->driver_id || $order_job->status_id == JobStatus::getStatusId(JobStatus::REJECTED)) {
                            $jobAssign->user_id = $request->driver_id;
                            $jobAssign->save();
                            $order_job->status_id = JobStatus::getStatusId(JobStatus::ASSIGNED);
                            $order_job->save();
                            $msg = 'Job reassigned to '.$jobAssign->user->name.'<br>';
                            $this->jobOrderStatusHistory($order_job_id, Auth::id(), $order_job->status_id, JobStatus::getStatusId(JobStatus::ASSIGNED), $msg.$request->comment);
                            event(new JobAssignedEvent($request->driver_id, $daily_job->job_number, $order_job));
                            $result = back()->with('success', 'Mass jobs assigned updated successfully');
                        } else {
                            $result = back()->with('info', "Can't assign the same driver again!!!");
                        }
                    } else {
                        $jobAssign = JobAssign::create([
                            'order_job_id' => $order_job_id,
                            'user_id' => $request->driver_id,
                        ]);
                        $msg = 'Job assigned to '.$jobAssign->user->name.'<br>';
                        $this->jobOrderStatusHistory($order_job_id, Auth::id(), $order_job->status_id, JobStatus::getStatusId(JobStatus::ASSIGNED), $msg.$request->comment);
                        $order_job->status_id = JobStatus::getStatusId(JobStatus::ASSIGNED);
                        $order_job->save();
                        event(new JobAssignedEvent($request->driver_id, $daily_job->job_number, $order_job));
                        $result = back()->with('success', 'Mass jobs assigned successfully');
                    }
                }

                return $result;
            }
        } else {
            $jobAssign = JobAssign::where('order_job_id', $request->order_job_id)->first();
            $daily_job = DailyJob::where('order_job_id', $request->order_job_id)->first();
            $order_job = OrderJob::findOrFail($request->order_job_id);
            if ($jobAssign) {
                if ($jobAssign->user_id != $request->driver_id || $order_job->status_id == JobStatus::getStatusId(JobStatus::REJECTED)) {
                    $jobAssign->user_id = $request->driver_id;
                    $jobAssign->save();
                    $order_job->status_id = JobStatus::getStatusId(JobStatus::ASSIGNED);
                    $order_job->save();
                    $msg = 'Job reassigned to '.$jobAssign->user->name.'<br>';
                    $this->jobOrderStatusHistory($request->order_job_id, Auth::id(), $order_job->status_id, JobStatus::getStatusId(JobStatus::ASSIGNED), $msg.$request->comment);
                    event(new JobAssignedEvent($request->driver_id, $daily_job->job_number, $order_job));

                    return back()->with('success', 'Job Assigned updated successfully');
                } else {
                    return back()->with('info', "Can't assign the same driver again!!!");
                }
            } else {
                $jobAssign = JobAssign::create([
                    'order_job_id' => $request->order_job_id,
                    'user_id' => $request->driver_id,
                ]);
                $msg = 'Job assigned to '.$jobAssign->user->name.'<br>';
                $this->jobOrderStatusHistory($request->order_job_id, Auth::id(), $order_job->status_id, JobStatus::getStatusId(JobStatus::ASSIGNED), $msg.$request->comment);
                $order_job->status_id = JobStatus::getStatusId(JobStatus::ASSIGNED);
                $order_job->save();
                event(new JobAssignedEvent($request->driver_id, $daily_job->job_number, $order_job));

                return back()->with('success', 'Job Assigned successfully');
            }
        }
    }

    public function updateHistory(Request $request)
    {
        if ($request->ajax() && $request->id && $request->comment) {
            $comment = JobStatusHistory::findOrFail($request->id);
            $comment->comment = $request->comment;
            $comment->save();
            if ($comment->wasChanged()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function deleteHistory(Request $request)
    {
        if ($request->ajax() && $request->id) {
            $comment = JobStatusHistory::findOrFail($request->id);
            $comment->comment = null;
            $comment->clearMediaCollection('job_status_images');
            $comment->save();
            if ($comment->wasChanged()) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('template.admin.job.create_job');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validator($request->all())->validate();
        $request->has('van_hire') ? $vanHire = true : $vanHire = false;
        $dailyJobs = DailyJob::getTodaysJobCount();
        if ($dailyJobs) {
            $dailyJobs += 1;
        } else {
            $dailyJobs = 1;
        }
        DB::beginTransaction();
        try {
            $address_book_id = null;
            if ($request->from_add_to_address_book) {
                $address_book_id = $this->makeNewAddress($request->customer, $request->all(), 'from');
            }
            if ($request->to_add_to_address_book) {
                $address_book_id = $this->makeNewAddress($request->customer, $request->all(), 'to');
            }

            $job = OrderJob::create([
                'user_id' => $request->customer,
                'customer_contact_id' => $this->updateOrCreate($request->customer, $request->customer_contact),
                'from_area_id' => $request->from_area_id,
                'to_area_id' => $request->to_area_id,
                'timeframe_id' => $request->timeframe_id,
                'notes' => $request->notes,
                'van_hire' => $vanHire,
                'number_box' => $request->number_box,
                'status_id' => JobStatus::getStatusId(JobStatus::NEW_JOB),
            ]);

            $this->makeNewJobAddress($job->id, $request->all(), 'from', $address_book_id);
            $this->makeNewJobAddress($job->id, $request->all(), 'to', $address_book_id);

            $job->job_increment_id = $job->createIncrementJobId($job->id);
            $job->save();

            DailyJob::create([
                'order_job_id' => $job->id,
                'job_number' => Carbon::now()->format('ymd').'-'.$dailyJobs,

            ]);
            $this->jobOrderStatusHistory($job->id, Auth::id(), null, JobStatus::getStatusId(JobStatus::NEW_JOB));
            DB::commit();

            return redirect()->route('job.index')->with('success', 'Job Created successfully');
        } catch (Exception $e) {
            DB::rollback();

            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Validator for validate data in the request.
     *
     * @param  array  $data The data
     * @param  int|null  $id The identifier for update validation
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     **/
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
                'customer' => ['required'],
                'customer_contact' => ['string'],
                'company_name_from' => ['required'],
                'company_name_to' => ['required'],
                'street_address_from' => ['required'],
                'street_number_from' => ['required'],
                'suburb_from' => ['required'],
                'city_from' => ['required'],
                'state_from' => ['required'],
                'zip_from' => ['required'],
                'country_from' => ['required'],
                'place_id_from' => ['required'],
                'latitude_from' => ['required'],
                'longitude_from' => ['required'],
                'location_url_from' => ['required'],
                'json_response_from' => ['required'],
                'from_area_id' => ['required'],
                'street_address_to' => ['required'],
                'street_number_to' => ['required'],
                'suburb_to' => ['required'],
                'city_to' => ['required'],
                'state_to' => ['required'],
                'zip_to' => ['required'],
                'country_to' => ['required'],
                'place_id_to' => ['required'],
                'latitude_to' => ['required'],
                'longitude_to' => ['required'],
                'location_url_to' => ['required'],
                'json_response_to' => ['required'],
                'to_area_id' => ['required'],
            ]
        );
    }

    /**
     * @return AddressBook
     */
    private function makeNewAddress($user_id, $address, $input_id)
    {
        if (isset($address['edit_id_'.$input_id]) && ! empty($address['edit_id_'.$input_id])) {
            $newAddress = AddressBook::find($address['edit_id_'.$input_id]);
            if ($newAddress == null) {
                $newAddress = AddressBook::create([
                    'user_id' => $user_id,
                    'company_name' => $address['company_name_'.$input_id],
                    'street_address' => $address['street_address_'.$input_id],
                    'street_number' => $address['street_number_'.$input_id],
                    'suburb' => $address['suburb_'.$input_id],
                    'city' => $address['city_'.$input_id],
                    'state' => $address['state_'.$input_id],
                    'zip' => $address['zip_'.$input_id],
                    'country' => $address['country_'.$input_id],
                    'place_id' => $address['place_id_'.$input_id],
                    'area_id' => $address[$input_id.'_area_id'],
                    'latitude' => $address['latitude_'.$input_id],
                    'longitude' => $address['longitude_'.$input_id],
                    'location_url' => $address['location_url_'.$input_id],
                    'full_json_response' => $address['json_response_'.$input_id],
                    'status' => true,
                    'set_as_default' => false,
                ]);
            } else {
                $newAddress->company_name = $address['company_name_'.$input_id];
                $newAddress->street_address = $address['street_address_'.$input_id];
                $newAddress->street_number = $address['street_number_'.$input_id];
                $newAddress->suburb = $address['suburb_'.$input_id];
                $newAddress->city = $address['city_'.$input_id];
                $newAddress->state = $address['state_'.$input_id];
                $newAddress->zip = $address['zip_'.$input_id];
                $newAddress->country = $address['country_'.$input_id];
                $newAddress->place_id = $address['place_id_'.$input_id];
                $newAddress->area_id = $address[$input_id.'_area_id'];
                $newAddress->latitude = $address['latitude_'.$input_id];
                $newAddress->longitude = $address['longitude_'.$input_id];
                $newAddress->location_url = $address['location_url_'.$input_id];
                $newAddress->full_json_response = $address['json_response_'.$input_id];
                if ($newAddress->isDirty('company_name') || $newAddress->isDirty('street_address') || $newAddress->isDirty('street_number') || $newAddress->isDirty('suburb') || $newAddress->isDirty('city') || $newAddress->isDirty('state') || $newAddress->isDirty('zip') || $newAddress->isDirty('country') || $newAddress->isDirty('area_id')) {
                    $newAddress = AddressBook::create([
                        'user_id' => $user_id,
                        'company_name' => $address['company_name_'.$input_id],
                        'street_address' => $address['street_address_'.$input_id],
                        'street_number' => $address['street_number_'.$input_id],
                        'suburb' => $address['suburb_'.$input_id],
                        'city' => $address['city_'.$input_id],
                        'state' => $address['state_'.$input_id],
                        'zip' => $address['zip_'.$input_id],
                        'country' => $address['country_'.$input_id],
                        'place_id' => $address['place_id_'.$input_id],
                        'area_id' => $address[$input_id.'_area_id'],
                        'latitude' => $address['latitude_'.$input_id],
                        'longitude' => $address['longitude_'.$input_id],
                        'location_url' => $address['location_url_'.$input_id],
                        'full_json_response' => $address['json_response_'.$input_id],
                        'status' => true,
                        'set_as_default' => false,
                    ]);
                } else {
                    $newAddress->save();
                }
            }
        } else {
            $newAddress = AddressBook::create([
                'user_id' => $user_id,
                'company_name' => $address['company_name_'.$input_id],
                'street_address' => $address['street_address_'.$input_id],
                'street_number' => $address['street_number_'.$input_id],
                'suburb' => $address['suburb_'.$input_id],
                'city' => $address['city_'.$input_id],
                'state' => $address['state_'.$input_id],
                'zip' => $address['zip_'.$input_id],
                'country' => $address['country_'.$input_id],
                'place_id' => $address['place_id_'.$input_id],
                'area_id' => $address[$input_id.'_area_id'],
                'latitude' => $address['latitude_'.$input_id],
                'longitude' => $address['longitude_'.$input_id],
                'location_url' => $address['location_url_'.$input_id],
                'full_json_response' => $address['json_response_'.$input_id],
                'status' => true,
                'set_as_default' => false,
            ]);
        }

        return $newAddress->id;
    }

    private function updateOrCreate(int|string $user_id, string $customer_contact): int|string
    {
        return CustomerContact::updateOrCreate(
            ['user_id' => $user_id,
                'customer_contact' => $customer_contact,
            ],
            [
                'user_id' => $user_id,
                'customer_contact' => $customer_contact,
            ]
        )->id;
    }

    /**
     * @return mixed
     */
    private function makeNewJobAddress($order_job_id, $address, $type, $address_book_id = null)
    {
        $newAddress = JobAddress::where('order_job_id', $order_job_id)->where('type', $type)->first();
        if ($newAddress) {
            $newAddress->address_book_id = $address_book_id;
            $newAddress->company_name = $address['company_name_'.$type];
            $newAddress->street_address = $address['street_address_'.$type];
            $newAddress->street_number = $address['street_number_'.$type];
            $newAddress->suburb = $address['suburb_'.$type];
            $newAddress->city = $address['city_'.$type];
            $newAddress->state = $address['state_'.$type];
            $newAddress->zip = $address['zip_'.$type];
            $newAddress->country = $address['country_'.$type];
            $newAddress->place_id = $address['place_id_'.$type];
            $newAddress->latitude = $address['latitude_'.$type];
            $newAddress->longitude = $address['longitude_'.$type];
            $newAddress->location_url = $address['location_url_'.$type];
            $newAddress->full_json_response = $address['json_response_'.$type];
            $newAddress->save();

            return $newAddress;
        } else {
            return JobAddress::create([
                'order_job_id' => $order_job_id,
                'address_book_id' => $address_book_id,
                'type' => $type,
                'company_name' => $address['company_name_'.$type],
                'street_address' => $address['street_address_'.$type],
                'street_number' => $address['street_number_'.$type],
                'suburb' => $address['suburb_'.$type],
                'city' => $address['city_'.$type],
                'state' => $address['state_'.$type],
                'zip' => $address['zip_'.$type],
                'country' => $address['country_'.$type],
                'place_id' => $address['place_id_'.$type],
                'latitude' => $address['latitude_'.$type],
                'longitude' => $address['longitude_'.$type],
                'location_url' => $address['location_url_'.$type],
                'full_json_response' => $address['json_response_'.$type],
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws ValidationException
     */
    public function update(Request $request, OrderJob $job): RedirectResponse
    {
        $this->validator($request->all(), $job->id)->validate();
        $request->has('van_hire') ? $vanHire = true : $vanHire = false;
        DB::beginTransaction();
        try {
            $address_book_id = null;
            if ($request->from_add_to_address_book) {
                $address_book_id = $this->makeNewAddress($request->customer, $request->all(), 'from');
            }
            if ($request->to_add_to_address_book) {
                $address_book_id = $this->makeNewAddress($request->customer, $request->all(), 'to');
            }
            $job->user_id = $request->customer;
            $job->customer_contact_id = $this->updateOrCreate($request->customer, $request->customer_contact);
            $job->from_area_id = $request->from_area_id;
            $job->to_area_id = $request->to_area_id;
            $job->timeframe_id = $request->timeframe_id;
            $job->notes = $request->notes;
            $job->van_hire = $vanHire;
            $job->number_box = $request->number_box;
            $job->save();

            $fromJobAddress = $this->makeNewJobAddress($job->id, $request->all(), 'from', $address_book_id);
            $toJobAddress = $this->makeNewJobAddress($job->id, $request->all(), 'to', $address_book_id);

            if ($job->status_id != $request->status_id && $request->status_id != JobStatus::getStatusId(JobStatus::ASSIGNED)) {
                $this->jobOrderStatusHistory($job->id, Auth::id(), $job->status_id, $request->status_id, $request->comment, $request->comment);
                $job->status_id = $request->status_id;
                $job->save();
            }

            if ($request->has('driver_id')) {
                $jobAssign = JobAssign::where('order_job_id', $job->id)->first();
                if ($jobAssign && $jobAssign->user_id != $request->driver_id) {
                    $jobAssign->user_id = $request->driver_id;
                    $jobAssign->save();
                    $job->status_id = JobStatus::getStatusId(JobStatus::ASSIGNED);
                    $job->save();
                    $msg = 'Job reassigned to '.$jobAssign->user->name.'<br>';
                    $this->jobOrderStatusHistory($job->id, Auth::id(), $job->status_id, JobStatus::getStatusId(JobStatus::ASSIGNED), $msg.$request->comment);
                    event(new JobAssignedEvent($request->driver_id, $job->job_number, $job));
                } else {
                    $Assign = JobAssign::where('order_job_id', $job->id)->where('user_id', $request->driver_id)->first();
                    if (! $Assign) {
                        $jobAssign = JobAssign::create([
                            'order_job_id' => $job->id,
                            'user_id' => $request->driver_id,
                        ]);
                        $job->status_id = JobStatus::getStatusId(JobStatus::ASSIGNED);
                        $job->save();
                        $msg = 'Job assigned to '.$jobAssign->user->name.'<br>';
                        $this->jobOrderStatusHistory($job->id, Auth::id(), $job->status_id, JobStatus::getStatusId(JobStatus::ASSIGNED), $msg.$request->comment);
                        event(new JobAssignedEvent($request->driver_id, $job->job_number, $job));
                    }
                }
            }
            DB::commit();
            if ($job->wasChanged() || $fromJobAddress->wasChanged() || $toJobAddress->wasChanged()) {
                return redirect()->route('job.index')->with('success', 'Job Updated successfully');
            }

            return back()->with('info', 'No changes have made.');
        } catch (Exception $e) {
            DB::rollback();

            return back()->with('error', $e->getMessage());
        }
    }

    private function jobOrderStatusHistory($order_job_id, $user_id, $from_status, $to_status, $comment = null): void
    {
        JobStatusHistory::create([
            'order_job_id' => $order_job_id,
            'user_id' => $user_id,
            'from_status_id' => $from_status,
            'to_status_id' => $to_status,
            'comment' => $comment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function edit(OrderJob $job)
    {
        $job->load('fromAddress', 'toAddress', 'customerContact', 'jobStatusHistory');

        return view('template.admin.job.edit_job', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function view(OrderJob $job)
    {
        $job->load('fromAddress', 'toAddress', 'customerContact', 'jobStatusHistory');

        return view('template.admin.job.view_job', compact('job'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderJob $job): RedirectResponse
    {
        $job->delete();

        return back()->with('success', 'Job Deleted successfully');
    }
}
