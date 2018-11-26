<?php

namespace App\DataTables;

use App\Model\Supplier;
use Yajra\DataTables\Services\DataTable;

class SupplierDataTable extends DataTable
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
            ->addColumn('region', function ($item) {
                return $item->region->name;
            })
            ->addColumn('products', function ($items) {
                $items = collect($items->products)->pluck('name')->toArray();

                if(count($items) != 0)
                    return implode(", ", $items);

                return '-';
            })
            ->addColumn('action', function ($data) {
                return view('suppliers.action')
                    ->with(['supplier' => $data])
                    ->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Model\Supplier $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Supplier $model)
    {
        return $model->newQuery()
            ->with(['region', 'products'])
            ->select([
                'id',
                'region_id',
                'name',
                'email',
                'phone'
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
            'region',
            'products',
            'name',
            'email',
            'phone'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Supplier_' . date('YmdHis');
    }
}
