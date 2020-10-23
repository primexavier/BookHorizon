<?php

namespace App\DataTables;

use App\Model\Book;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BookDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('updated_at', function ($query) 
            {
                return date('d-m-Y h:i:s', strtotime($query->updated_at) );
            })
            ->editColumn('created_at', function ($query) 
            {
                return date('d-m-Y h:i:s', strtotime($query->created_at) );
            })
            ->addColumn('action', '<a href="{{route(\'backend.book.detail\',$id)}}" class="btn btn-info" style="color:white"><i class="fas fa-info"></i></a> 
            <a href="{{route(\'backend.book.update\',$id)}}" style="color:white" class="btn btn-success"><i class="fas fa-edit"></i></a> 
            <form method="post" action="{{route(\'backend.book.delete\',$id)}}" style="display:inline-block">
                @csrf
                <button type="submit" style="color:white" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </form>');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Book $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Book $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('book-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->parameters([
                        'buttons' => ['create','excel','csv','print'],
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('title'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(150)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Book_' . date('YmdHis');
    }
}
