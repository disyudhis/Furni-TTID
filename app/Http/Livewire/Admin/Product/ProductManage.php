<?php

namespace App\Http\Livewire\Admin\Product;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\Product\ProductService;
use App\Services\Category\CategoryService;

class ProductManage extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $title;
    public $image;
    public $price;
    public $discount_price;
    public $category;
    public $selected;

    protected $rules = [
        'title' => 'required|min:1',
        'price' => 'required',
        'discount_price' => 'nullable|lt:price',
        'image' => 'required|image|mimes:jpeg,png|max:1024',
        'category' => 'required'
    ];

    public function mount(ProductService $productService = null)
    {
        $select_product = request()->query('product');
        if ($select_product != null) {
            $product = $productService->getById($select_product);
            $this->selected = $product;
            $this->title = $product->title;
            $this->price = $product->price;
            $this->category = $product->category_id;
            $this->discount_price = $product->discount_price;
            $this->image = $product->image;
        }
    }

    public function update()
    {
        $this->validate();
        $imagename = time() . '.' . $this->image->getClientOriginalExtension();
        $this->image->storeAs('public', $imagename);
        $this->selected->update([
            'title' => $this->title,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'category_id' => $this->category,
            'image' => $imagename,
        ]);
        $this->title = null;
        $this->price = null;
        $this->discount_price = null;
        $this->image = null;
        $this->category = null;
        $this->alert('success', 'Product updated!');
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store(ProductService $product_service)
    {
        $this->validate();
        $imagename = time() . '.' . $this->image->getClientOriginalExtension();
        $this->image->storeAs('public', $imagename);
        $data = [
            'title' => $this->title,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'image' => $imagename,
            'category_id' => $this->category
        ];
        $product_service->create($data);
        $this->title = null;
        $this->price = null;
        $this->discount_price = null;
        $this->image = null;
        $this->category = null;
        $this->alert('success', 'Product added succesfully!');
    }

    public function render(CategoryService $category_service)
    {
        $categories = $category_service->getAll();
        return view('livewire.admin.product.product-manage', compact('categories'))->extends('layouts.admin-app')->section('content');
    }
}