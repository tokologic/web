<?php

namespace App\DataTables\Stall;

use App\Model\Stall\PurchaseOrder;
use Yajra\DataTables\Services\DataTable;

class PODatatable extends DataTable
{
    public function dataTable($query)
    {
        return datatables($query)
            ->escapeColumns([])
            ->editColumn('amount', function ($data) {
                return rupiah($data->amount);
            })
            ->addColumn('stall', function($item) {
                return $item->stall->name;
            })
            ->addColumn('action', function ($data) {
                if ($this->module == 'gr') {
                    return view('stalls.gr.action')
                        ->with(['gr' => $data])
                        ->render();
                } else {
                    return view('stalls.po.action')
                        ->with(['po' => $data])
                        ->render();
                }
            });
    }

    public function query(PurchaseOrder $model)
    {
        return $model->newQuery()
            ->with('stall')
            ->select([
                'id',
                'store_id',
                'delivery_date',
                'amount',
                'payment_status',
                'received_payment'
            ]);
    }

    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters($this->getBuilderParameters());
    }

    protected function getColumns()
    {
        return [
            'id',
            'stall',
            'delivery_date',
            'amount',
            'payment_status',
            'received_payment'
        ];
    }

    protected function filename()
    {
        return 'PODataTables_' . date('YmdHis');
    }
}
