<?php

namespace App\DataTables\Warehouse;

use App\Model\Warehouse\PurchaseOrder;
use App\User;
use Yajra\DataTables\Services\DataTable;

class PODataTables extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', function ($data) {
                return view('warehouse.po.action')
                    ->with(['po' => $data])
                    ->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param PurchaseOrder $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PurchaseOrder $model)
    {
        return $model->newQuery()->select('id', 'delivery_date', 'status', 'amount');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '150px'])
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'delivery_date',
            'status',
            'amount'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'PODataTables_' . date('YmdHis');
    }
}
