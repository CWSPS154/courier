<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Customer\JobsResource;
use App\Models\JobStatus;
use App\Models\OrderJob;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(): AnonymousResourceCollection
    {
        $type = \request()->get('type');

        return JobsResource::collection(
            OrderJob::with([
                'user:name,id',
                'customerContact:customer_contact,id',
                'fromArea:area,id',
                'toArea:area,id',
                'status:status,id',
                'creator:name,id',
                'editor:name,id',
                'dailyJob:job_number,id,order_job_id',
                'jobAssign:order_job_id,user_id,id',
                'jobAssign.user:name,id',
                'fromAddress',
                'toAddress',
                'jobStatusHistory',
                'jobStatusHistory.user:name,id',
                'jobStatusHistory.fromStatus:status,id',
                'jobStatusHistory.toStatus:status,id'
            ])
                ->select('order_jobs.*')
                ->where('order_jobs.user_id', Auth::id())
                ->where('order_jobs.status_id', $type === 'active'
                    ? '!='
                    : '=', JobStatus::getStatusId(JobStatus::DELIVERED)
                )
                ->orderBy('order_jobs.created_at', 'desc')
                ->paginate()
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param OrderJob $orderJob
     * @return JobsResource|JsonResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function show(OrderJob $orderJob): JsonResponse|JobsResource
    {
        $type = \request()->get('type');

        if ($orderJob->user_id != Auth::id()) {
            return response()->json(['message' => "Unauthorized job"], 403);
        }

        if ($type === 'active' && in_array($orderJob->status_id, [
                JobStatus::getStatusId(JobStatus::PICKED_UP),
                JobStatus::getStatusId(JobStatus::DELIVERED),
                JobStatus::getStatusId(JobStatus::CANCELLED),
            ])) {
            return response()->json(['message' => "Not found corresponding job in the active job list"], 404);
        }

        if ($type !== 'active' && $orderJob->status_id !== JobStatus::getStatusId(JobStatus::DELIVERED)) {
            return response()->json(['message' => "Not found corresponding job in the completed job list"], 404);
        }

        return new JobsResource(
            $orderJob->load([
                'user:name,id',
                'customerContact:customer_contact,id',
                'fromArea:area,id',
                'toArea:area,id',
                'status:status,id',
                'creator:name,id',
                'editor:name,id',
                'dailyJob:job_number,id,order_job_id',
                'jobAssign:order_job_id,user_id,id',
                'jobAssign.user:name,id',
                'fromAddress',
                'toAddress',
                'jobStatusHistory',
                'jobStatusHistory.user:name,id',
                'jobStatusHistory.fromStatus:status,id',
                'jobStatusHistory.toStatus:status,id'
            ])
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param OrderJob $orderJob
     * @return Response
     */
    public function update(Request $request, OrderJob $orderJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param OrderJob $orderJob
     * @return Response
     */
    public function destroy(OrderJob $orderJob)
    {
        //
    }
}
