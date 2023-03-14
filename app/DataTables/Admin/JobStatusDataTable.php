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

namespace App\DataTables\Admin;

use App\Helpers\Helper;
use App\Models\JobStatus;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class JobStatusDataTable extends DataTable
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
            ->addColumn('action', function ($query) {
                return view(
                    'components.admin.datatable.button',
                    ['edit' => Helper::getRoute('job_status.edit', $query->id)]
                );
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     */
    public function query(JobStatus $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('permission-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive()
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
     */
    public function getColumns(): array
    {
        return [
            Column::make('no')->data('DT_RowIndex')->searchable(false)->sortable(false),
            Column::make('status')->sortable(false),
            Column::make('identifier')->sortable(false),
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
        return 'Admin/JobStatus_'.date('YmdHis');
    }
}
