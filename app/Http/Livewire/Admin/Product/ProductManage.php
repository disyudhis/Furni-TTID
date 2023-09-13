<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Table\CategoryTable;
use App\Services\Category\CategoryService;
use Livewire\Component;

class ProductManage extends Component
{

    public function render(CategoryService $categoryService)
    {
        $categories = $categoryService->getAll();
        return view('livewire.admin.product.product-manage', compact('categories'))->extends('layouts.admin-app')->section('content');
    }
}