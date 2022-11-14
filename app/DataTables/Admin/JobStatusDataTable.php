<?php

/**
 * PHP Version  8.1.11
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
 * Date 14/11/22
 * */

namespace App\DataTables\Admin;

use App\Helpers\Helper;
use App\Models\JobStatus;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JobStatusDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($query) {
                return view(
                    'components.admin.datatable.button',
                    ['edit' => Helper::getRoute('job_status.edit', $query->id),
                        'delete' => Helper::getRoute('job_status.destroy', $query->id), 'id' => $query->id]
                );
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param JobStatus $model
     * @return Builder
     */
    public function query(JobStatus $model)
    {
        return $model->select('*')->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
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
                'buttons' => ['excel', 'csv', 'pdf', 'print', [
                    'text' => 'New Status',
                    'className' => 'bg-primary mb-lg-0 mb-3',
                    'action' => 'function( e, dt, button, config){
                         window.location = "' . Helper::getRoute('job_status.create') . '";
                     }'
                ],]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'status',
            'identifier',
            'action'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin/JobStatus_' . date('YmdHis');
    }
}
