<?php

namespace App\DataTables;

use App\Models\Kandidat;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KandidatDatatable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $datatable = new EloquentDataTable($query);
        return $datatable->addColumn('photo_path', function ($data) {
            if (empty($data->photo_path)) {
                return '';
            }
            return '<img src=' . $data['photo_path'] . ' width="80" height="80" />';
        })
            ->addColumn('action', function ($query) {
                $data['action'] = $this->actions($query);
                return view('datatable.actions', compact('data', 'query'))->render();
            })
            ->addIndexColumn()
            ->rawColumns(['photo_path', 'action'])
            ->setRowId('id');
    }

    public function actions($id)
    {
        return  [
            [
                'title' => 'Hapus',
                'icon' => 'bi bi-trash',
                'route' => route('backend.kandidat.delete', $id),
                'type' => 'delete',
            ],
            [
                'title' => 'Edit',
                'icon' => 'bi bi-pen',
                'route' => route('backend.kandidat.edit', $id),
                'type' => '',
            ],
        ];
    }

    public function query(Kandidat $model): QueryBuilder
    {
        return $model->newQuery()->OrderBy('id', 'desc');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('category-table')
            ->columns($this->getColumns())
            ->minifiedAjax();
    }


    protected function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('#')->orderable(false)->searchable(false),
            Column::make('name')->title(__('field.kandidat_name')),
            Column::make('visi')->title(__('field.visi')),
            Column::make('misi')->title(__('field.misi')),
            Column::make('nomor_urut')->title(__('field.number')),
            Column::make('photo_path')->title(__('field.photo')),
            Column::make('action')->title(__('field.action'))->orderable(false),
        ];
    }



    protected function filename(): string
    {
        return 'Order_' . date('YmdHis');
    }
}
