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

namespace App\Http\Controllers\Driver;

use App\DataTables\Driver\AcceptedJobDataTable;
use App\DataTables\Driver\JobDataTable;
use App\Http\Controllers\Controller;
use App\Models\JobStatus;
use App\Models\JobStatusHistory;
use App\Models\OrderJob;
use Auth;
use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(AcceptedJobDataTable $dataTable)
    {
        return $dataTable->render('template.driver.job.index_job');
    }

    public function updateHistory(Request $request)
    {
        if ($request->ajax() && $request->id && $request->comment) {
            $comment = JobStatusHistory::where('user_id', Auth::id())->findOrFail($request->id);
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
     * Display the specified resource.
     *
     * @return Application|Factory|View
     */
    public function show(OrderJob $myjob)
    {
        $myjob->load('fromAddress', 'toAddress', 'jobStatusHistory', 'dailyJob', 'creator');

        return view('template.driver.job.view_job', compact('myjob'));
    }

    private function jobOrderStatusHistory($order_job_id, $user_id, $from_status, $to_status, $comment = null, $photo = null): void
    {
        $jobStatusHistory = JobStatusHistory::create([
            'order_job_id' => $order_job_id,
            'user_id' => $user_id,
            'from_status_id' => $from_status,
            'to_status_id' => $to_status,
            'comment' => $comment,
        ]);
        if ($photo) {
            $jobStatusHistory
                ->addMedia($photo)
                ->preservingOriginal()
                ->toMediaCollection('job_status_images');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderJob $myjob): RedirectResponse
    {
        $this->jobOrderStatusHistory($myjob->id, \Illuminate\Support\Facades\Auth::id(), $myjob->status_id, JobStatus::getStatusId(JobStatus::ACCEPTED));
        $myjob->status_id = JobStatus::getStatusId(JobStatus::ACCEPTED);
        $myjob->save();
        if ($myjob->wasChanged()) {
            return back()->with('success', 'Job Accepted successfully');
        }

        return back()->with('info', 'Job Is Not Accepted');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderJob $myjob): RedirectResponse
    {
        $this->jobOrderStatusHistory($myjob->id, \Illuminate\Support\Facades\Auth::id(), $myjob->status_id, JobStatus::getStatusId(JobStatus::REJECTED));
        $myjob->status_id = JobStatus::getStatusId(JobStatus::REJECTED);
        $myjob->save();
        if ($myjob->wasChanged()) {
            return back()->with('success', 'Job Rejected successfully');
        }

        return back()->with('info', 'Job Is Not Rejected');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderJob $myjob): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->jobOrderStatusHistory($myjob->id, \Illuminate\Support\Facades\Auth::id(), $myjob->status_id, $request->status, $request->comment, $request->photo);
            $myjob->status_id = $request->status;
            $myjob->save();
            DB::commit();
            if ($myjob->wasChanged()) {
                if ($myjob->status_id == JobStatus::getStatusId(JobStatus::DELIVERED)) {
                    return redirect()->route('myjob.index')->with('success', 'Job Status changed successfully');
                }

                return back()->with('success', 'Job Status changed successfully');
            }

            return back()->with('info', 'Job Status is not changed');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->with('error', $e->getMessage());
        }
    }
}
