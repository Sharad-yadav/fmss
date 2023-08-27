<?php

namespace App\DataTables\Admin;

use App\Models\Student;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class StudentsDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => false,
                    'is_delete' => false,
                    'is_show' => true,
                    'route' => 'admin.student.',
                    'url' => 'admin/student',
                    'row' => $row,
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->setRowId('id');
    }

    public function query(Student $model): QueryBuilder
    {
        return $model->with(['user', 'faculty', 'batch', 'semester', 'section']);
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('students-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('pdf'),
                Button::make('print'),
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('id', 'ID'),
            Column::make('user.name', 'user.name'),
            Column::make('user.email', 'user.email'),
            Column::make('faculty.name', 'faculty.name'),
            Column::make('batch.batch_year', 'batch.batch_year'),
            Column::make('semester.name', 'semester.name'),
            Column::make('section.name', 'section.name'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(240)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'Students_' . date('YmdHis');
    }
}
