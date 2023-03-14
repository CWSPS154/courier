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
 * Date 14/11/22
 * */

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\JobStatusDataTable;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\JobStatus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class JobStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JobStatusDataTable $dataTable): View|Factory|JsonResponse|Application
    {
        return $dataTable->render('template.admin.job_status.index_job_status');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Factory|Application
    {
        return view('template.admin.job_status.create_job_status');
    }

    /**
     * Validator for validate data in the request.
     *
     * @param  array  $data The data
     * @param  int|string|null  $id The identifier for update validation
     */
    protected function validator(array $data, int|string $id = null): \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
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
                'status' => ['required', 'string', 'max:250'],
                'identifier' => ['required', 'string', 'unique:job_status,identifier,'.$id],

            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validator($request->all())->validate();
        JobStatus::create([
            'status' => $request->status,
            'identifier' => Helper::strLoU($request->identifier),
        ]);

        return redirect()->route('job_status.index')->with('success', 'Job Status is saved successfully');
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param JobStatus $jobStatus
//     * @return Response
//     */
//    public function show(JobStatus $jobStatus)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobStatus $jobStatus): View|Factory|Application
    {
        return view('template.admin.job_status.edit_job_status', compact('jobStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws ValidationException
     */
    public function update(Request $request, JobStatus $jobStatus): RedirectResponse
    {
        $this->validator($request->all(), $jobStatus->id)->validate();
        $jobStatus->status = $request->status;
        $jobStatus->identifier = Helper::strLoU($request->identifier);
        $jobStatus->save();
        if ($jobStatus->wasChanged()) {
            return redirect()->route('job_status.index')->with('success', 'Job Status is updated successfully');
        }

        return back()->with('info', 'No changes have made.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobStatus $jobStatus): RedirectResponse
    {
        try {
            $jobStatus->delete();

            return back()->with('success', 'Job Status deleted successfully');
        } catch (QueryException $e) {
            return back()->with(
                'error',
                'You Can not delete this job status due to data integrity violation, Error:'.$e->getMessage()
            );
        }
    }
}
