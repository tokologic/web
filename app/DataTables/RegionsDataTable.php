<?php

namespace App\DataTables;

use App\Model\Region;
use Yajra\DataTables\Services\DataTable;

class RegionsDataTable extends DataTable
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
            ->addColumn('parent', function ($item) {
                if ($item->parent)
                    return optional($item->parent)->name;
                return '-';
            })
            ->addColumn('postal_code', function ($item) {
                if ($item->postal_code)
                    return $item->postal_code;
                return '-';
            })
            ->addColumn('action', function ($data) {
                return view('regions.action')
                    ->with(['region' => $data])
                    ->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Model\Region $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Region $model)
    {
        return $model->newQuery()->with('parent')
            ->select([
                'id',
                'parent_id',
                'name',
                'postal_code'
            ]);
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
            'parent',
            'name',
            'postal_code'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Region_' . date('YmdHis');
    }
}
