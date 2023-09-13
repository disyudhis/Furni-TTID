<?php

namespace App\Http\Livewire\Admin\Category;

use App\Services\Category\CategoryService;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CategoryManage extends Component
{
    use LivewireAlert;
    public $name;
    protected $rules = [
        'name' => 'required|min:1|unique:categories'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store(CategoryService $categoryService)
    {
        $this->validate();
        $data = [
            'name' => $this->name
        ];
        $categoryService->create($data);
        $this->name = null;
        $this->alert('success', 'Category added succesfully');
    }

    public function render()
    {
        return view('livewire.admin.category.category-manage')->extends('layouts.admin-app')->section('content');
    }
}