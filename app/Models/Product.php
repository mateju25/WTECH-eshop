<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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

    public function productGroup()
    {
        return $this->belongsTo(ProductGroup::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'id', 'id');
    }
}
