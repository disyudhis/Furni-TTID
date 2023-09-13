<?php

namespace App\Models\Table;

use App\Models\Entity\Category;
use App\Models\Entity\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductTable extends Product
{
    public function category(): BelongsTo
    {
        $this->belongsTo(CategoryTable::class, 'category_id');
    }
}