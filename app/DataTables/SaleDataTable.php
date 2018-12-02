<?php

namespace App\DataTables;

use App\Model\Sale;
use Yajra\DataTables\Services\DataTable;

class SaleDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables($query)
            ->escapeColumns([])
            ->addColumn('action', function ($data) {
                return view('sale.action')
                    ->with(['sale' => $data])
                    ->render();
            });
    }

    public function query(Sale $model)
    {
        return $model->newQuery()->select('id', 'payment_method', 'amount', 'cash', 'change', 'tax', 'info');
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '150px'])
            ->parameters($this->getBuilderParameters());
    }

    protected function getColumns()
    {
        return [
            ['data' => 'id', 'name' => 'id', 'title' => '#', 'width' => '100px'],
            'payment_method',
            'amount',
            'cash',
            'change',
            'tax',
            'info'
        ];
    }

    protected function filename()
    {
        return 'Sale_' . date('YmdHis');
    }
}
