<?php

namespace App\DataTables;

use App\Model\User;
use Cartalyst\Sentinel\Users\EloquentUser;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     * @throws \Throwable
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->escapeColumns([])
            ->addColumn('role', function ($item) {
                if (count($item->roles) > 0) {
                    return optional($item->roles[0])->name;
                }

                return '-';
            })
            ->addColumn('action', function ($data) {
                return view('users.action')
                    ->with(['user' => $data])
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
        return $model->newQuery()->with('roles')->select('id', 'email');
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
            'email',
            'role'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }

}
