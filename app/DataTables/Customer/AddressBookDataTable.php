<?php

/**
 * PHP Version 8.1.11
 * Laravel Framework 9.43.0
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
 * Date 11/12/22
 * */

namespace App\DataTables\Customer;

use App\Models\AddressBook;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;

class AddressBookDataTable extends DataTable
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
            ->editColumn('set_as_default', function ($query) {
                if ($query->set_as_default) {
                    return '<span class="text-success"><i class="fa fa-check"></span>';
                } else {
                    return '<span class="text-danger"><i class="fa fa-minus-circle"></span>';
                }
            })
            ->editColumn('status', function ($query) {
                if ($query->status) {
                    return '<span class="text-success">Active</span>';
                } else {
                    return '<span class="text-danger">Inactive</span>';
                }
            })
            ->addColumn('action', function($query){
                return view(
                    'components.admin.datatable.button',
                    ['edit' => Helper::getRoute('address_book.edit', $query->id),
                        'delete' => Helper::getRoute('address_book.destroy', $query->id), 'id' => $query->id]
                );
            })
            ->rawColumns(['set_as_default', 'status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param AddressBook $model
     * @return QueryBuilder
     */
    public function query(AddressBook $model): QueryBuilder
    {
        return $model->newQuery()->where('user_id', Auth::id())->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return HtmlBuilder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('address-book-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive()
            ->orderBy(1)
            ->selectStyleSingle()
            ->pagingType('numbers')
            ->parameters([
                'dom' => 'Bfrtip',
                'buttons' => [[
                    'text' => 'Create New Address',
                    'className' => 'bg-primary mb-lg-0 mb-3',
                    'action' => 'function( e, dt, button, config){
                         window.location = "' . Helper::getRoute('address_book.create') . '";
                     }'
                ],]
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('no')->data('DT_RowIndex')->searchable(false)->sortable(false),
            Column::make('company_name')->sortable(false),
            Column::make('street_number')->sortable(false),
            Column::make('street_address')->sortable(false),
            Column::make('suburb')->sortable(false),
            Column::make('city')->sortable(false),
            Column::make('state')->sortable(false),
            Column::make('zip')->sortable(false),
            Column::make('country')->sortable(false),
            Column::make('default')->name('set_as_default')->data('set_as_default'),
            Column::make('status'),
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
        return 'Customer/AddressBook_' . date('YmdHis');
    }
}
