<?php

namespace App\DataTables;

use App\Filters\ProductFilters;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($product) {
                $editButton = '<a href="' . route('products.edit', $product->id) . '" class="btn btn-sm btn-primary">Edit</a>';
                $showButton = '<a href="' . route('products.show', $product->id) . '" class="btn btn-sm btn-primary">Show</a>';
                $deleteButton = '<button class="btn btn-sm btn-danger delete-product" data-id="' . $product->id . '">Delete</button>';
                return $editButton . ' ' . $deleteButton . ' ' . $showButton;
            })
            ->editColumn('created_at', function ($product) {
                return $product->created_at->format('Y-m-d H:i:s');
            })
            ->editColumn('updated_at', function ($product) {
                return $product->updated_at->format('Y-m-d H:i:s');
            })
            ->setRowId('id');

    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
//        return $model->newQuery();

        $productFilters = new ProductFilters(request());

        return $model->filter($productFilters)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('products-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
//                        Button::make('excel'),
//                        Button::make('csv'),
//                        Button::make('pdf'),
//                        Button::make('print'),
                Button::make('add'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('quantity'),
            Column::make('status'),
            Column::make('price'), // Add the role column here
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Products_' . date('YmdHis');
    }
}
