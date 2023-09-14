<?php

namespace App\Models\Table;

use App\Models\Entity\Category;
use App\Models\Entity\Product;
use App\Models\Table\ProductTable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryTable extends Category
{
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}