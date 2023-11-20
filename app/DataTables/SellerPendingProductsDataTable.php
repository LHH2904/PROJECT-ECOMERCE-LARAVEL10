<?php

namespace App\DataTables;

use App\Models\Product;
use App\Models\SellerPendingProduct;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SellerPendingProductsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('admin.products.edit', $query->id) . "' class='btn btn-primary'><i class='fa-regular fa-pen-to-square'></i></a>";
                $deleteBtn = "<a href='" . route('admin.products.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='fa-regular fa-trash-can'></i></a>";
                $moreBtn = "<div class='dropdown dropleft d-inline ml-2'>
                            <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fa-solid fa-gear'></i>
                            </button>
                            <div class='dropdown-menu' x-placement='bottom-start' style='position: absolute; transform: translate3d(0px, 28px,0px); top: 0px; left: 0px; will-change: transform;'>
                                <a class='dropdown-item has-icon' href='" . route('admin.products-image-gallery.index', ['product' => $query->id]) . "'><i class='far fa-heart'></i> Image Gallery</a>
                                <a class='dropdown-item has-icon' href='" . route('admin.products-variant.index', ['product' => $query->id]) . "'><i class='far fa-file'></i>Variants</a>
                            </div>
                        </div>";
                return $editBtn . $deleteBtn . $moreBtn;
            })
            ->addColumn('image', function ($query) {
                return $img = "<img width='100px' src='" . asset($query->thumb_image) . "'></img>";
            })
            ->addColumn('type', function ($query) {
                switch ($query->product_type) {
                    case 'new_arrival':
                        return '<i class="badge badge-success">New_arrival</i>';
                        break;
                    case 'featured_product':
                        return '<i class="badge badge-warning">Featured_product</i>';
                        break;
                    case 'top_product':
                        return '<i class="badge badge-info">Top_product</i>';
                        break;
                    case 'best_product':
                        return '<i class="badge badge-danger">Best_product</i>';
                        break;
                    default:
                        return '<i class="badge badge-dark">None</i>';
                        break;
                }
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 1) {
                    $button = '<label class="custom-switch mt-2">
                        <input type="checkbox" checked name="custom-switch-checbox" class="custom-switch-input change-status" data-id="' . $query->id . '">
                        <span class="custom-switch-indicator"></span>
                    </label>';
                } else {
                    $button = '<label class="custom-switch mt-2">
                        <input type="checkbox" name="custom-switch-checbox" class="custom-switch-input change-status" data-id="' . $query->id . '">
                        <span class="custom-switch-indicator"></span>
                    </label>';
                }

                return $button;
            })
            ->addColumn('vendor', function ($query) {
                return $query->vendor->shop_name;
            })
            ->addColumn('approve', function ($query) {
                return "<select class='form-control is_approve' data-id='$query->id'>
                <option value='0'>Pending</option>
                <option value='1'>Approved</option>
                </select>";
            })
            ->rawColumns(['image', 'action', 'status', 'type', 'approve'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('is_approved', 0)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('sellerpendingproducts-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
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
            Column::make('vendor'),
            Column::make('image'),
            Column::make('name'),
            Column::make('price'),
            Column::make('type')->width(100),
            Column::make('status'),
            Column::make('approve')->width(100),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SellerPendingProducts_' . date('YmdHis');
    }
}
