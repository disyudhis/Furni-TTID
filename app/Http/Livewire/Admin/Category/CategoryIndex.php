<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Services\Category\CategoryService;
use Livewire\WithPagination;

class CategoryIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $entries = 5;
    public $search;

    public function delete(CategoryService $categoryService, $id)
    {
        $categoryService->delete($id);
        $this->alert('success', 'Category succesfully deleted');
    }
    public function render(CategoryService $categoryService)
    {
        $categories = $categoryService->dataTable(new Request([
            'entries' => $this->entries,
            'sort_type' => 'desc',
            'search_key' => $this->search,
            'search_columns' => 'name'
        ]));
        return view('livewire.admin.category.category-index', compact('categories'))->extends('layouts.admin-app')->section('content');
    }
}