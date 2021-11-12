<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
//    protected $primaryKey = 'product_id';
    protected $table = 'products';
    protected $fillable = [
        'name',
        'shortDescription',
        'longDescription',
        'businessType',
        'size',
        'prize',
        'discountedPrize',
        'soldedCount',
        'rating',
        'top',
        'bestOfWeek'
    ];


    public function images()
    {
        return $this->hasMany('App\Models\Image', 'id', 'id');
    }
}
