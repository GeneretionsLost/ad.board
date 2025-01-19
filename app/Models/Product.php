<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'subcategory_id', 'description', 'image', 'status'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
