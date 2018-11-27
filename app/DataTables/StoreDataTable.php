<?php

namespace App\DataTables;

use App\Model\Store;
use App\User;
use Yajra\DataTables\Services\DataTable;

class StoreDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('midwife', function($item) {
                return $item->midwife->first_name;
            })
            ->addColumn('region', function($item) {
                return $item->region->name;
            })
            ->addColumn('action', function($data) {
                return view('stores.action')
                    ->with(['store' => $data])
                    ->render();
            });
    }

    public function query(Store $model)
    {
        return $model->newQuery()
            ->with(['region', 'midwife'])
            ->select([
                'id',
                'midwife_id',
                'region_id',
                'name',
                'address',
                'acreage'
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
            ['data' => 'id', 'name' => 'id', 'title' => '#', 'width' => '100px'],
            'midwife',
            'region',
            'name',
            'address',
            'acreage'
        ];
    }

    protected function filename()
    {
        return 'Store_' . date('YmdHis');
    }
}
