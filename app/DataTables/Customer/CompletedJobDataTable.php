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

namespace App\DataTables\Customer;

use App\Models\JobStatus;
use App\Models\OrderJob;
use Helper;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Auth;

class CompletedJobDataTable extends DataTable
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
            ->addColumn('assigned_to', function ($query) {
                if (isset($query->jobAssign)) {
                    return '<span class="text-success">' . $query->jobAssign->user->name . '</span>';
                } else {
                    return '<span class="text-warning">Not Assigned</span>';
                }
            })
            ->editColumn('created_at', function ($query) {
                return $query->created_at->diffForHumans();
            })
            ->editColumn('creator.name', function ($query) {
                return $query->creator->name;
            })
            ->addColumn('action', function ($query) {
                return view(
                    'components.admin.datatable.view_button',
                    ['view' => Helper::getRoute('jobs.completed.view', $query->id)]
                );
            })
            ->rawColumns(['assigned_to','van_hire', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param OrderJob $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(OrderJob $model): \Illuminate\Database\Eloquent\Builder
    {
        return $model->with('fromArea:area,id', 'toArea:area,id', 'status:status,id', 'creator:name,id', 'editor:name,id','dailyJob:job_number,id,order_job_id','jobAssign:order_job_id,user_id,id', 'jobAssign.user:name,id')
            ->where('order_jobs.user_id', Auth::id())->where('order_jobs.status_id',JobStatus::getStatusId(JobStatus::DELIVERED))->select('*')->orderBy('order_jobs.created_at', 'desc');
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
                'buttons' => ['excel', 'csv', 'pdf', 'print']
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
            'from_area_id' => new Column(
                ['title' => 'From',
                    'data' => 'from_area_id',
                    'name' => 'from_area_id',
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
            'assigned_to' => new Column(
                ['title' => 'Assigned To',
                    'data' => 'assigned_to',
                    'name' => 'jobAssign.user.name',
                    'searchable' => true]
            ),
            'created_at',
            'created_by' => new Column(
                ['title' => 'Created By',
                    'data' => 'creator.name',
                    'name' => 'creator.name',
                    'searchable' => false]
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
        return 'Customer/Job_' . date('YmdHis');
    }
}
