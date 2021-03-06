<?php

namespace App\DataTables\Warehouse;

use App\Model\Warehouse\PurchaseOrderItem;
use Yajra\DataTables\Services\DataTable;

class POItemDataTable extends DataTable
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
                return view('warehouse.item.action')
                    ->with(['item' => $data])
                    ->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param PurchaseOrderItem $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PurchaseOrderItem $model)
    {
        return $model->newQuery()->with(['product', 'purchaseOrder'])
            ->where('po_id', '=', $this->po->id);
//            ->select('id', 'discount', 'currency', 'unit_price', 'sub_total', 'gross_price');
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
            ['data' => 'id', 'name' => 'id', 'title' => '#', 'width' => '30px'],
            ['data' => 'product', 'name' => 'product', 'title' => 'Product', 'orderable' => false, 'searchable' => false],
            'qty', 'unit_price', 'sub_total', 'gross_price', 'action'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'POItem_' . date('YmdHis');
    }
}
