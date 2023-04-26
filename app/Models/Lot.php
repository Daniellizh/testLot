<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'text', 'category_id'];

    public function lots()
    {
        return $this->belongsTo(Category::class);
    }
}
