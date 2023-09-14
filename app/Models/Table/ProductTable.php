<?php

namespace App\Models\Table;

use App\Models\Entity\Category;
use App\Models\Entity\Product;
use App\Models\Table\CategoryTable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductTable extends Product
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}