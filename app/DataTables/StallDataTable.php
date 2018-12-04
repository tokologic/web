<?php

namespace App\DataTables;

use App\Model\Stall;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;

class StallDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables($query)
            ->escapeColumns([])
            ->addColumn('midwife', function ($item) {
                return optional($item->midwife)->first_name;
            })
            ->addColumn('package', function ($item) {
                return optional($item->package)->name . ' - ' . optional($item->package)->price;
            })
            ->addColumn('region', function ($item) {
                return optional($item->region)->name;
            })
            ->editColumn('status', function ($item) {
                if ($item->status == 'deployed') {
                    return $item->status . ' at ' . Carbon::parse($item->deployment_date)->format('d M Y');
                } else {
                    return $item->status;
                }
            })
            ->addColumn('action', function ($data) {
                return view('stalls.action')
                    ->with(['store' => $data])
                    ->render();
            });
    }

    public function query(Stall $model)
    {
        $user = \Sentinel::getUser();
        $roles = $user->roles->pluck('slug')->toArray();

        $builder = $model->newQuery()
            ->with(['region', 'midwife', 'package']);

        if (in_array('midwife', $roles)) {
            $builder->where('midwife_id', $user->id);
        }

        return $builder;
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
            'package',
            'status'
        ];
    }

    protected function filename()
    {
        return 'Stall_' . date('YmdHis');
    }
}
