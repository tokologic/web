<?php

namespace App\DataTables;

use App\Model\Warehouse;
use Yajra\DataTables\Services\DataTable;

class WarehouseDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables($query)
            ->escapeColumns([])
            ->addColumn('region', function ($item) {
                return $item->region->name;
            })
            ->editColumn('name', function ($item) {
                return "<a href='" . route('warehouses.stocks.index', $item->id) . "'>" . $item->name . "</a>";
            })
            ->addColumn('action', function ($data) {
                return view('warehouse.action')
                    ->with(['warehouse' => $data])
                    ->render();
            });
    }

    public function query(Warehouse $model)
    {
        return $model->newQuery()
            ->with('region')
            ->select([
                'id',
                'region_id',
                'name',
                'address'
            ]);
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
            'name',
            'region',
            'address'
        ];
    }

    protected function filename()
    {
        return 'Warehouse_' . date('YmdHis');
    }
}
