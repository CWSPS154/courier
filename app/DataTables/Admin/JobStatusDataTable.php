<?php

namespace App\DataTables\Admin;

use App\Models\JobStatus;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\Helper;

class JobStatusDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addIndexColumn()
            ->addColumn('action', function($query){
                return view(
                    'components.admin.datatable.button',
                    ['edit' => Helper::getRoute('job_status.edit', $query->id)]
                );
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param JobStatus $model
     * @return QueryBuilder
     */
    public function query(JobStatus $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return HtmlBuilder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('permission-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive()
            ->orderBy(1)
            ->selectStyleSingle()
            ->pagingType('numbers');
//          ->parameters([
//                'dom' => 'Bfrtip',
//                'buttons' => [ [
//                    'text' => 'New Status',
//                    'className' => 'bg-primary mb-lg-0 mb-3',
//                    'action' => 'function( e, dt, button, config){
//                         window.location = "' . Helper::getRoute('job_status.create') . '";
//                     }'
//                ],]
//            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('no')->data('DT_RowIndex')->searchable(false),
            Column::make('status'),
            Column::make('identifier'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Admin/JobStatus_' . date('YmdHis');
    }
}
