<?php

namespace App\DataTables\Stall;

use App\Model\Stall\PurchaseOrderItem;
use Yajra\DataTables\Services\DataTable;

class POItemDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables($query)
            ->escapeColumns([])
            ->editColumn('discount', function ($data) {
                return $data->discount . "%";
            })
            ->editColumn('unit_price', function ($data) {
                return rupiah($data->unit_price);
            })
            ->editColumn('sub_total', function ($data) {
                return rupiah($data->sub_total);
            })
            ->editColumn('gross_price', function ($data) {
                return rupiah($data->gross_price);
            })
            ->addColumn('product', function ($data) {
                return optional($data->product)->name;
            })
            ->addColumn('action', function ($data) {
                return view('stalls.po.item.action')
                    ->with(['item' => $data])
                    ->render();
            });
    }

    public function query(PurchaseOrderItem $model)
    {
        return $model->newQuery()->with(['product', 'purchaseOrder'])
            ->where('po_id', '=', $this->po->id);
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
            ['data' => 'id', 'name' => 'id', 'title' => '#', 'width' => '10px'],
            ['data' => 'product', 'name' => 'product', 'title' => 'Product', 'orderable' => false, 'searchable' => false],
            'qty', 'currency', 'unit_price', 'gross_price', 'sub_total', 'discount', 'action'
        ];
    }

    protected function filename()
    {
        return 'POItem_' . date('YmdHis');
    }
}
