<?php

namespace App\DataTables;

use App\Model\SaleItem;
use Yajra\DataTables\Services\DataTable;

class SaleItemDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables($query)
            ->escapeColumns([])
            ->addColumn('item', function ($item) {
                return $item->item->product->name;
            })
            ->addColumn('action', function ($data) {
                return view('sale.item.action')
                    ->with(['sale_item' => $data])
                    ->render();
            });
    }

    public function query(SaleItem $model)
    {
        return $model->newQuery()
            ->with(['item', 'item.product'])
            ->where('sale_id', $this->sale->id)
            ->select(['id', 'store_item_id', 'unit_price', 'amount', 'qty']);
    }

    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters($this->getBuilderParameters());
    }

    protected function getColumns()
    {
        return [
            ['data' => 'id', 'name' => 'id', 'title' => '#', 'width' => '100px'],
            'item',
            'unit_price',
            'amount',
            'qty',
            'action'
        ];
    }

    protected function filename()
    {
        return 'SaleItem_' . date('YmdHis');
    }
}
