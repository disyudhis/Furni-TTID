<?php

namespace App\Http\Livewire\Admin\Product;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Services\Product\ProductService;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';
    public $entries = 5;
    public $search;
    public $select_product;

    public function edit(ProductService $product_service, $id)
    {
        $product = $product_service->edit($id);
        return redirect()->route('manage-product', compact('product'));
    }

    public function delete(ProductService $product_service, $id)
    {
        $product_service->delete($id);
        $this->alert('success', 'Product deleted succesfully');
    }

    public function render(ProductService $product_service)
    {
        $products = $product_service->dataTable(new Request([
            'entries' => $this->entries,
            'sort_type' => 'desc',
            'search_key' => $this->search,
            'search_columns' => 'name'
        ]));
        return view('livewire.admin.product.product-index', compact('products'))->extends('layouts.admin-app')->section('content');
    }
}