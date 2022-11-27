<?php

/**
 * PHP Version 7.4.25
 * Laravel Framework 8.83.18
 *
 * @category DataTable
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

namespace App\DataTables\Driver;

use App\Models\JobStatus;
use App\Models\OrderJob;
use App\Models\JobAssign;
use Helper;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Auth;

class JobDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('daily_job_number', function ($query) {
                return $query->dailyJob->job_number ?? '';
            })
            ->editColumn('user.id', function ($query) {
                return $query->user->customer->company_name . ', ' . $query->user->customer->customer_id . ' - ' . $query->user->name;
            })
            ->editColumn('from_area_id', function ($query) {
                return $query->fromArea->area;
            })
            ->editColumn('to_area_id', function ($query) {
                return $query->toArea->area;
            })
            ->editColumn('van_hire', function ($query) {
                if ($query->van_hire) {
                    return '<span class="text-success">Yes</span>';
                } else {
                    return '<span class="text-danger">No</span>';
                }
            })
            ->editColumn('status', function ($query) {
                return $query->status->status;
            })
            ->addColumn('action', function ($query) {
                return view(
                    'components.admin.datatable.accept_reject_button',
                    ['accept' => Helper::getRoute('myjob.edit', $query->id),
                        'reject' => Helper::getRoute('myjob.destroy', $query->id), 'id' => $query->id,
                        'view' => Helper::getRoute('myjob.show', $query->id),
                    ]
                );
            })
            ->rawColumns(['van_hire', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param OrderJob $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(OrderJob $model): \Illuminate\Database\Eloquent\Builder
    {
        return $model->with('user:name,id', 'fromArea:area,id', 'toArea:area,id', 'timeFrame:time_frame,id', 'jobAssign', 'status:status,id','dailyJob:job_number,id,order_job_id')
            ->whereHas('jobAssign', function ($q) {
                $q->where('user_id', Auth::id());
            })->where('order_jobs.status_id',JobStatus::getStatusId(JobStatus::ASSIGNED))->select('order_jobs.*')->orderBy('order_jobs.created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('id')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive()
            ->orderBy(1)
            ->pagingType('numbers')
            ->parameters([
                'dom' => 'Bfrtip',
                'buttons' => [[
                    'text' => 'Accepted Jobs',
                    'className' => 'bg-primary mb-lg-0 mb-3',
                    'action' => 'function( e, dt, button, config){
                         window.location = "' . Helper::getRoute('myjob.create') . '";
                     }'
                ],]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            'daily_job_number' => new Column(
                ['title' => 'Job Number',
                    'data' => 'daily_job_number',
                    'name' => 'dailyJob.job_number',
                    'searchable' => true]
            ),
            'user_id' => new Column(
                ['title' => 'Customer',
                    'data' => 'user.id',
                    'name' => 'user.name',
                    'searchable' => true]
            ),
            'from_area_id' => new Column(
                ['title' => 'From',
                    'data' => 'from_area_id',
                    'name' => 'fromArea.area',
                    'searchable' => true]
            ),
            'to_area_id' => new Column(
                ['title' => 'To',
                    'data' => 'to_area_id',
                    'name' => 'toArea.area',
                    'searchable' => true]
            ),
            'van_hire',
            'number_box',
            'status_id' => new Column(
                ['title' => 'Status',
                    'data' => 'status',
                    'name' => 'status.status',
                    'searchable' => true]
            ),
            'action'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Driver/Job_' . date('YmdHis');
    }
}
