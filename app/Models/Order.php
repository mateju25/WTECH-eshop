<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'state',
    ];


    public function customerInfo()
    {
        return $this->hasOne(CustomerInfo::class);
    }
//
//    public function deliveryType()
//    {
//        return $this->hasOne(DeliveryType::class, 'id', 'id');
//    }
//
//    public function paymentType()
//    {
//        return $this->hasOne(PaymentType::class, 'id', 'id');
//    }

    public function productGroups()
    {
        return $this->hasMany(ProductGroup::class);
    }

    public function scopeTotalSum() {
        $total = 0;
        foreach ($this->productGroups()as $productGroup)
            foreach ($productGroup->products() as $product)
                $total += $product->prize;

        return $total;
    }
}
