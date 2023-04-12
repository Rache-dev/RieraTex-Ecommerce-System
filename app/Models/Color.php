<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;

    protected $guarded = [];

    //each color belongs to many products

    public function products ()
    {
        # code...
        return $this->belongsToMany(Product::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

}