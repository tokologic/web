<?php

namespace App\DataTables;

use App\Model\Stall\Item;
use Yajra\DataTables\Services\DataTable;

class StallItemDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables($query)
            ->escapeColumns([])
            ->addColumn('product', function ($item) {
                return $item->product->name;
            })
            ->addColumn('action', function ($data) {
                return view('stalls.item.action')
                    ->with(['item' => $data])
                    ->render();
            });
    }

    public function query(Item $model)
    {
        return $model->newQuery()->with('product')->select('id', 'product_id', 'retail_price', 'average_price', 'qty', 'min', 'max', 'whole_sale_price');
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
            'id',
            'product',
            'retail_price',
            'average_price',
            'qty', 'min', 'max',
            'whole_sale_price'
        ];
    }

    protected function filename()
    {
        return 'StallItem_' . date('YmdHis');
    }
}
