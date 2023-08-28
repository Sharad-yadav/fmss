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
    protected array $actions = ['excel', 'pdf', 'print'];
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('semester', function ($row) {
                return ($row->semester->faculty->name . " ". $row->semester->name) ?? null;
            })
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
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
        return $model->with(['user', 'faculty', 'batch', 'semester', 'section'])->select('students.*');
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
            Column::make('user.name', 'user.name')->title('Name'),
            Column::make('user.email', 'user.email')->title('Email'),
            Column::make('faculty.name', 'faculty.name')->title('Faculty'),
            Column::make('batch.batch_year', 'batch.batch_year')->title('Batch_Year'),
            Column::make('semester', 'semester.faculty.name')->title('Semester'),
            Column::make('section.name', 'section.name')->title('Section'),
            Column::make('user.number','user.number')->title('phone'),
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
