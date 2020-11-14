<?php

namespace App\DataTables;

use App\Models\Tablet;
use Collective\Html\FormFacade;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TabletDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($t) {
                return view('restrito.datatable.acoes_padrao', [
                    'editar' => route('restrito.tablets.edit', $t),
                    'excluir' => route('restrito.tablets.destroy', $t)
                ]);
            });
    }

    public function query(Tablet $tablet)
    {
        return $tablet->newQuery();
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('tablet-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')
                            ->addClass('btn btn-primary')
                            ->text('<i class="fas fa-plus-circle"></i> Cadastrar'),
                        Button::make('print')
                            ->addClass('btn btn-primary')
                            ->text('<i class="fas fa-print"></i> Imprimir')
                    );
    }

    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center'),
            Column::make('name'),
            Column::make('model'),
            Column::make('power_of_lock'),
            Column::make('average_current'),
            Column::make('tv'),
            Column::make('radio')
            
        ];
    }

    protected function filename()
    {
        return 'Tablet_' . date('YmdHis');
    }
}
