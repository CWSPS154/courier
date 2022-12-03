<?php

/**
 * PHP Version 8.1.11
 * Laravel Framework 9.34.0
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

namespace App\DataTables\Admin\User;

use App\Models\OrderJob;
use App\Models\Role;
use App\Models\User;
use Helper;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CustomerDataTable extends DataTable
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
            ->editColumn('customer.customer_id', function ($query) {
                return $query->customer_id;
            })
            ->editColumn('customer.company_name', function ($query) {
                return $query->company_name;
            })
            ->editColumn('email', function ($query) {
                return '<a href="mailto:' . $query->email . '">' . $query->email . '</a> ';
            })
            ->editColumn('area', function ($query) {
                return $query->customer->area->area ?? 'NA';
            })
//            ->editColumn('mobile', function ($query) {
//                return $query->mobile ? '<a href="tel:' . $query->mobile . '">' . $query->mobile . '</a>' : 'NA';
//            })
            ->editColumn('is_active', function ($query) {
                if ($query->is_active) {
                    return '<span class="text-success">Active</span>';
                } else {
                    return '<span class="text-danger">Inactive</span>';
                }
            })
            ->addColumn('action', function ($query) {
                if(OrderJob::getJobsCount($query->user_id)) {
                    return view(
                        'components.admin.datatable.button',
                        ['edit' => Helper::getRoute('customer.edit', $query->user_id)]
                    );
                }else{
                    return view(
                        'components.admin.datatable.button',
                        ['edit' => Helper::getRoute('customer.edit', $query->user_id),
                            'delete' => Helper::getRoute('customer.destroy', $query->user_id), 'id' => $query->user_id]
                    );
                }
            })
            ->rawColumns(['email', 'is_active', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): \Illuminate\Database\Eloquent\Builder
    {
        return $model->select('*')->with('customer:user_id,company_name,customer_id,id,area_id','customer.area')->where('role_id', Role::getRoleId(Role::CUSTOMER))
            ->orderByDesc('users.created_at');
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
                'buttons' => ['excel', 'csv', 'pdf', 'print', [
                    'text' => 'New Customer',
                    'className' => 'bg-primary mb-lg-0 mb-3',
                    'action' => 'function( e, dt, button, config){
                         window.location = "' . Helper::getRoute('customer.create') . '";
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
            'CID' => new Column(
                ['title' => 'CID',
                    'data' => 'customer.customer_id',
                    'name' => 'customer.customer_id',
                    'searchable' => true]
            ),
            'company_name' => new Column(
                ['title' => 'Company Name',
                    'data' => 'customer.company_name',
                    'name' => 'customer.company_name',
                    'searchable' => true]
            ),
            'first_name',
            'last_name',
            'email',
            'area' => new Column(
                ['title' => 'Area',
                    'data' => 'area',
                    'name' => 'customer.area.area',
                    'searchable' => true]
            ),
            'status' => new Column(
                ['title' => 'Status',
                    'data' => 'is_active',
                    'name' => 'is_active',
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
        return 'User/Customer_' . date('YmdHis');
    }
}
