<?php

namespace App\Models\Table;

use App\Models\Entity\Category;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryTable extends Category
{
    public function products(): HasMany
    {
        return $this->hasMany(ProductTable::class, 'category_id');
    }
}