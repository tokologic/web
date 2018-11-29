<?php

namespace App\DataTables;

use App\Model\Warehouse\StockItem;
use App\User;
use Yajra\DataTables\Services\DataTable;

class StockDataTable extends DataTable
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
            ->rawColumns(['action'])
            ->addColumn('product', function ($data) {
                return $data->product->name;
            })
            ->editColumn('average_price', function ($data) {
                return rupiah($data->average_price);
            })
            ->editColumn('whole_sale_price', function ($data) {
                return rupiah($data->whole_sale_price);
            })
            ->addColumn('action', function ($data) {
                return view('stocks.action')
                    ->with(['stock' => $data, 'warehouse' => $data->warehouse])
                    ->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(StockItem $model)
    {
        return $model->newQuery()->with(['product', 'warehouse'])
            ->where('warehouse_id', $this->warehouse->id);
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
            'id',
            'product',
            'average_price',
            'qty',
            'min',
            'max',
            'whole_sale_price',
            'bin_location',
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
        return 'Stock_' . date('YmdHis');
    }
}
