<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lot extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'category_id'];

    public function categories(): BelongsTo
     {
         return $this->BelongsTo(Category::class, 'category_id', 'id');
     }
}
