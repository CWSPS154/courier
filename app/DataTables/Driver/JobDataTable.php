<?php

/**
 * PHP Version 8.1.11
 * Laravel Framework 9.43.0
 *
 * @category DataTable
 *
 * @author CWSPS154 <codewithsps154@gmail.com>
 * @license MIT License https://opensource.org/licenses/MIT
 *
 * @link https://github.com/CWSPS154
 *
 * Date 11/12/22
 * */

namespace App\DataTables\Driver;

use App\Models\JobStatus;
use App\Models\OrderJob;
use Helper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class JobDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param  QueryBuilder  $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addIndexColumn()
            ->editColumn('daily_job_number', function ($query) {
                return $query->dailyJob->job_number;
            })
            ->editColumn('from_company', function ($query) {
                return $query->fromAddress->company_name;
            })
            ->editColumn('to_company', function ($query) {
                return $query->toAddress->company_name;
            })
            ->editColumn('from_area_id', function ($query) {
                return '<a href="#" class="disabled" data-toggle="tooltip"  title="'.$query->fromAddress->street_number.','.$query->fromAddress->street_address.'">'.$query->fromArea->area.'</a>';
            })
            ->editColumn('to_area_id', function ($query) {
                return '<a href="#" class="disabled" data-toggle="tooltip" title="'.$query->toAddress->street_number.','.$query->toAddress->street_address.'">'.$query->toArea->area.'</a>';
            })
            ->editColumn('van_hire', function ($query) {
                if ($query->van_hire) {
                    return '<span class="text-success">Yes</span>';
                } else {
                    return '<span class="text-danger">No</span>';
                }
            })
            ->editColumn('status_id', function ($query) {
                return $query->status->status;
            })
            ->addColumn('assigned_to', function ($query) {
                if (isset($query->jobAssign)) {
                    return '<span class="text-success">'.$query->jobAssign->user->name.'</span>';
                } else {
                    return '<span class="text-warning">Not Assigned</span>';
                }
            })
            ->editColumn('created_at', function ($query) {
                return $query->created_at->format('Y-m-d h:i A');
            })
            ->editColumn('created_by', function ($query) {
                return $query->creator->name;
            })
            ->addColumn('action', function ($query) {
                if ($query->status->identifier == JobStatus::ASSIGNED) {
                    return view(
                        'components.admin.datatable.accept_reject_button',
                        [
                            'view' => Helper::getRoute('myjob.show', $query->id),
                            //                            'accept' => Helper::getRoute('myjob.update', $query->id),
                            //                            'reject' => Helper::getRoute('myjob.update', $query->id), 'id' => $query->id
                        ]
                    );
                } elseif ($query->status->identifier == JobStatus::ACCEPTED) {
                    return view(
                        'components.admin.datatable.view_button',
                        ['view' => Helper::getRoute('myjob.show', $query->id), 'picked_up' => Helper::getRoute('myjob.update', $query->id)]
                    );
                } elseif ($query->status->identifier == JobStatus::PICKED_UP) {
                    return view(
                        'components.admin.datatable.view_button',
                        ['view' => Helper::getRoute('myjob.show', $query->id), 'delivered' => Helper::getRoute('myjob.update', $query->id)]
                    );
                } else {
                    return view(
                        'components.admin.datatable.view_button',
                        ['view' => Helper::getRoute('myjob.show', $query->id)]
                    );
                }
            })
            ->rawColumns(['from_area_id', 'to_area_id', 'van_hire', 'assigned_to', 'action']);
    }

    /**
     * Get query source of dataTable.
     */
    public function query(OrderJob $model): QueryBuilder
    {
        return $model->newQuery()->with(['user:name,id', 'fromArea:area,id', 'toArea:area,id', 'timeFrame:time_frame,id', 'jobAssign', 'status:status,identifier,id', 'dailyJob:job_number,id,order_job_id', 'fromAddress', 'toAddress'])
            ->whereHas('jobAssign', function ($q) {
                $q->where('user_id', Auth::id());
            })->where('order_jobs.status_id', '!=', JobStatus::getStatusId(JobStatus::DELIVERED))->where('order_jobs.status_id', '!=', JobStatus::getStatusId(JobStatus::REJECTED))->select('order_jobs.*')->orderBy('order_jobs.created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('job-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive()
            ->selectStyleSingle()
            ->pagingType('numbers');
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('no')->data('DT_RowIndex')->searchable(false)->sortable(false),
            Column::make('job_number')->name('dailyJob.job_number')->data('daily_job_number')->sortable(false),
            Column::make('status')->name('status.status')->data('status_id')->sortable(false),
            Column::make('from_company')->name('fromAddress.company_name')->data('from_company')->sortable(false),
            Column::make('to_company')->name('toAddress.company_name')->data('to_company')->sortable(false),
            Column::make('from_area')->name('fromArea.area')->data('from_area_id')->sortable(false),
            Column::make('to_area')->name('toArea.area')->data('to_area_id')->sortable(false),
            Column::make('van_hire')->sortable(false),
            Column::make('assigned')->name('jobAssign.user.name')->data('assigned_to')->sortable(false),
            Column::make('created_at')->sortable(false),
            Column::make('created_by')->name('creator.name')->data('created_by')->sortable(false),
            Column::computed('action')
                ->exportable(false)
                ->printable(false),
        ];
    }

    /**
     * Get filename for export.
     */
    protected function filename(): string
    {
        return 'Driver/Job_'.date('YmdHis');
    }
}
