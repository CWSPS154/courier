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

namespace App\DataTables\Admin\User;

use App\Models\Role;
use App\Models\User;
use Helper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CustomerDataTable extends DataTable
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
            ->editColumn('cid', function ($query) {
                return $query->customer->customer_id;
            })
            ->editColumn('company_name', function ($query) {
                return $query->customer->company_name;
            })
            ->editColumn('email', function ($query) {
                return '<a href="mailto:'.$query->email.'">'.$query->email.'</a> ';
            })
            ->editColumn('mobile', function ($query) {
                return '<a href="tel:'.$query->mobile.'">'.$query->mobile.'</a>';
            })
            ->editColumn('area', function ($query) {
                return $query->customer->area->area;
            })
            ->editColumn('is_active', function ($query) {
                if ($query->is_active) {
                    return '<span class="text-success">Active</span>';
                } else {
                    return '<span class="text-danger">Inactive</span>';
                }
            })
            ->addColumn('action', function ($query) {
                if (count($query->jobs)) {
                    return view(
                        'components.admin.datatable.button',
                        ['edit' => Helper::getRoute('customer.edit', $query->id)]
                    );
                } else {
                    return view(
                        'components.admin.datatable.button',
                        ['edit' => Helper::getRoute('customer.edit', $query->id),
                            'delete' => Helper::getRoute('customer.destroy', $query->id), 'id' => $query->id]
                    );
                }
            })
            ->rawColumns(['email', 'mobile', 'is_active', 'action']);
    }

    /**
     * Get query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->with(['customer:user_id,company_name,customer_id,id,area_id', 'customer.area', 'jobs'])->select('users.*')
            ->where('users.role_id', Role::getRoleId(Role::CUSTOMER))->orderBy('users.created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('driver-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive()
            ->selectStyleSingle()
            ->pagingType('numbers')
            ->parameters([
                'dom' => 'Bfrtip',
                'buttons' => ['excel', 'csv', 'pdf', 'print', [
                    'text' => 'New Customer',
                    'className' => 'bg-primary mb-lg-0 mb-3',
                    'action' => 'function( e, dt, button, config){
                         window.location = "'.Helper::getRoute('customer.create').'";
                     }',
                ], ],
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('no')->data('DT_RowIndex')->searchable(false)->sortable(false),
            Column::make('cid')->title('CID')->name('customer.customer_id')->data('cid')->sortable(false),
            Column::make('company_name')->name('customer.company_name')->data('company_name')->sortable(false),
            Column::make('first_name')->sortable(false),
            Column::make('last_name')->sortable(false),
            Column::make('email')->sortable(false),
            Column::make('mobile')->sortable(false),
            Column::make('area')->name('customer.area.area')->data('area')->sortable(false),
            Column::make('status')->name('is_active')->data('is_active')->sortable(false),
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
        return 'Admin/User/Customer_'.date('YmdHis');
    }
}
