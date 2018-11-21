<?php

namespace App\DataTables;

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
    public function query(EloquentUser $model)
    {
        return $model->newQuery()->join('role_users', function ($join) {
            $join->on('role_users.user_id', '=', 'users.id');
        })->join('roles', function ($join) {
            $join->on('roles.id', '=', 'role_users.role_id')
                ->where('roles.slug','=','midwife');
        })->select('users.id', 'email');
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
            'email'
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
