<?php

namespace App\DataTables;

use App\Model\User\Midwife;
use Cartalyst\Sentinel\Users\EloquentUser;
use Yajra\DataTables\Services\DataTable;

class MidwivesDataTable extends DataTable
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
            ->addColumn('action', function ($data) {
                return view('midwives.action')
                    ->with(['midwife' => $data])
                    ->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param EloquentUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Midwife $model)
    {
        return $model->newQuery()->select('*');
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
            ['data' => 'full_name', 'name' => 'first_name', 'title' => 'Nama Lengkap'],
            'email',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Midwives_' . date('YmdHis');
    }
}
