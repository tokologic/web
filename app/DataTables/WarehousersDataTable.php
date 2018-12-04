<?php

namespace App\DataTables;

use App\Model\User;
use App\Model\User\Warehouser;
use Cartalyst\Sentinel\Users\EloquentUser;
use Yajra\DataTables\Services\DataTable;

class WarehousersDataTable extends DataTable
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
            ->addColumn('full_name', function ($data) {
                return $data->first_name . ' ' . $data->last_name;
            })
            ->addColumn('warehouse', function ($data) {
                return optional($data->warehouses->first())->name;
            })
            ->addColumn('action', function ($data) {
                return view('warehousers.action')
                    ->with(['warehouser' => $data])
                    ->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Warehouser $model)
    {
        return $model->newQuery()->with('warehouses');
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
            ['data' => 'id', 'name' => 'id', 'title' => '#', 'width' => '100px'],
            ['data' => 'full_name', 'name' => 'full_name', 'title' => 'Nama Lengkap'],
            'email',
            ['data' => 'warehouse', 'name' => 'warehouse', 'title' => 'Gudang'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'WHr_' . date('YmdHis');
    }
}
