<?php

namespace App\DataTables;

use App\Models\Author;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AuthorDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('status', fn ($author) => view('vendor.datatables.status-badge', ['status' => $author->status]))
            ->editColumn('actions', function($author) {
                return view('vendor.datatables.action-buttons', [
                    'show' => route('authors.show', ['author' => $author->id]),
                    'edit' => route('authors.edit', ['author' => $author->id]),
                    'destroy' => route('authors.destroy', ['author' => $author->id]),
                    'recordName' => 'Author',
                ]);
            })
            ->rawColumns(['status', 'action-buttons'])
            ->setRowId('id')
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Author $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('author-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('Order')
                ->addClass('text-center')
                ->searchable(false)
                ->orderable(false)
                ->exportable(false)
                ->printable(false),

            Column::make('name'),
            Column::make('surname'),
            Column::make('status')
                ->addClass('text-center align-middle'),


            Column::make('actions')
                ->addClass('text-center')
                ->searchable(false)
                ->orderable(false)
                ->exportable(false)
                ->printable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Author_' . date('YmdHis');
    }
}
