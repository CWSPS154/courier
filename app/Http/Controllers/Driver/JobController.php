<?php

/**
 * PHP Version 7.4.25
 * Laravel Framework 8.83.18
 *
 * @category Controller
 *
 * @package Laravel
 *
 * @author CWSPS154 <codewithsps154@gmail.com>
 *
 * @license MIT License https://opensource.org/licenses/MIT
 *
 * @link https://github.com/CWSPS154
 *
 * Date 28/08/22
 * */

namespace App\Http\Controllers\Driver;

use App\DataTables\Driver\JobDataTable;
use App\DataTables\Driver\AcceptedJobDataTable;
use App\Http\Controllers\Controller;
use App\Models\JobStatusHistory;
use App\Models\OrderJob;
use App\Models\JobAssign;
use App\Models\JobStatus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param JobDataTable $dataTable
     * @return Application|Factory|View
     */
    public function index(JobDataTable $dataTable)
    {
        return $dataTable->render('template.admin.job.index_job');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param AcceptedJobDataTable $dataTable
     * @return Application|Factory|View
     */
    public function create(AcceptedJobDataTable $dataTable)
    {
        return $dataTable->render('template.driver.job.index_job');
    }

    public function updateHistory(Request $request)
    {
        if($request->ajax() && $request->id && $request->comment)
        {
            $comment=JobStatusHistory::where('user_id',Auth::id())->findOrFail($request->id);
            $comment->comment=$request->comment;
            $comment->save();
            if($comment->wasChanged())
            {
                return true;
            } else{
                return false;
            }
        }
    }

    public function deleteHistory(Request $request)
    {
        if($request->ajax() && $request->id)
        {
            $comment=JobStatusHistory::findOrFail($request->id);
            $comment->delete();
            return true;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param OrderJob $myjob
     * @return Application|Factory|View
     */
    public function show(OrderJob $myjob)
    {
        $myjob->load('fromAddress','toAddress','jobStatusHistory');
        return view('template.driver.job.view_job', compact('myjob'));
    }

    /**
     * @param $order_job_id
     * @param $user_id
     * @param $from_status
     * @param $to_status
     * @param $comment
     * @return void
     */
    private function jobOrderStatusHistory($order_job_id, $user_id, $from_status, $to_status, $comment=null,$photo=null): void
    {
        $imageName=null;
        if($photo)
        {
            $imageName = time().'.'.$photo->extension();
            // Public Folder
            $photo->move(public_path('images/delivered'), $imageName);
        }
        JobStatusHistory::create([
            'order_job_id'=>$order_job_id,
            'user_id'=>$user_id,
            'from_status_id'=>$from_status,
            'to_status_id'=>$to_status,
            'photo'=>$imageName,
            'comment'=>$comment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param OrderJob $myjob
     * @return RedirectResponse
     */
    public function edit(OrderJob $myjob): RedirectResponse
    {
        $this->jobOrderStatusHistory($myjob->id, \Illuminate\Support\Facades\Auth::id(),$myjob->status_id,JobStatus::getStatusId(JobStatus::ACCEPTED));
        $myjob->status_id = JobStatus::getStatusId(JobStatus::ACCEPTED);
        $myjob->save();
        if ($myjob->wasChanged()) {
            return back()->with('success', 'Job Accepted successfully');
        }
        return back()->with('info', 'Job Is Not Accepted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param OrderJob $myjob
     * @return RedirectResponse
     */
    public function destroy(OrderJob $myjob): RedirectResponse
    {
        $this->jobOrderStatusHistory($myjob->id, \Illuminate\Support\Facades\Auth::id(),$myjob->status_id,JobStatus::getStatusId(JobStatus::REJECTED));
        $myjob->status_id = JobStatus::getStatusId(JobStatus::REJECTED);
        $myjob->save();
        if ($myjob->wasChanged()) {
            return back()->with('success', 'Job Rejected successfully');
        }
        return back()->with('info', 'Job Is Not Rejected');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param OrderJob $myjob
     * @return RedirectResponse
     */
    public function update(Request $request, OrderJob $myjob): RedirectResponse
    {
        $this->jobOrderStatusHistory($myjob->id, \Illuminate\Support\Facades\Auth::id(),$myjob->status_id,$request->status,$request->comment,$request->photo);
        $myjob->status_id = $request->status;
        $myjob->save();
        if ($myjob->wasChanged()) {
            if($myjob->status_id==JobStatus::getStatusId(JobStatus::DELIVERED))
            {
                return redirect()->route('myjob.index')->with('success', 'Job Status changed successfully');
            }
            return back()->with('success', 'Job Status changed successfully');
        }
        return back()->with('info', 'Job Status is not changed');
    }
}
