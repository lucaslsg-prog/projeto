<?php

namespace App\DataTables;

use App\Models\Smartphone;
use Collective\Html\FormFacade;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SmartphoneDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($s) {
                return view('restrito.datatable.acoes_padrao', [
                    'editar' => route('restrito.smartphones.edit', $s),
                    'excluir' => route('restrito.smartphones.destroy', $s)
                ]);
            });
            // ->addColumn('total_smartphones', function ($s) {
            //     return $s->livros()->count();
            // });
    }

    public function query(Smartphone $smartphone)
    {
        return $smartphone->newQuery();
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('smartphone-table')
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
                  ->title('Actions'),
            Column::make('name'),
            Column::make('model'),
            Column::make('tss'),
            Column::make('power_of_lock'),
            Column::make('average_current'),
            Column::make('current_measurement'),
            Column::make('esim'),
            Column::make('observations'),
            Column::make('radio'),
            Column::make('tv')
            //Column::computed('total_smartphones')->title('Total de Smartphones')
        ];
    }

    protected function filename()
    {
        return 'Smartphone_' . date('YmdHis');
    }
}
