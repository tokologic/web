<?php

namespace App\DataTables\Warehouse;

use App\Model\Warehouse\PurchaseOrder;
use Yajra\DataTables\Services\DataTable;

class PODataTable extends DataTable
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
            ->editColumn('amount', function ($data) {
                return rupiah($data->amount);
            })
            ->addColumn('action', function ($data) {

                if ($this->module == 'gr') {
                    return view('warehouse.gr.action')
                        ->with(['gr' => $data])
                        ->render();
                } else {
                    return view('warehouse.po.action')
                        ->with(['po' => $data])
                        ->render();
                }


            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param PurchaseOrder $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PurchaseOrder $model)
    {
        $user = \Sentinel::getUser();

        $builder = $model->newQuery();//->select('id', 'delivery_date', 'status', 'amount', 'description');

        $roles = $user->roles->pluck('slug')->toArray();
        if (in_array('finance', $roles)) {
            $builder->where('status', 'issued');
        }

        if (in_array('warehouse-keeper', $roles)) {
            $builder->where('status', 'approved');
        }

        return $builder;

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
            'id',
            'delivery_date',
            'amount',
            'status',
            'description',
            'action'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'PODataTables_' . date('YmdHis');
    }
}
