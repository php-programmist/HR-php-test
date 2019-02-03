<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }
    
    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_products')->withPivot('quantity', 'price');
    }
    
    public function getStatus($status_id)
    {
        $statusList = ['0' => __('system.new'), '10' => __('system.confirmed'), '20' => __('system.completed')];
        
        return $statusList[$status_id];
    }
    
    public function getTotalPrice()
    {
        $total = 0;
        $products = $this->products;
        foreach ($products as $product)
        {
            $total += $product->pivot->quantity * $product->pivot->price;
        }
        return $total;
    }
    
    public function getProductsNames()
    {
        $products = $this->products;
        $names = $products->pluck('name')->all();
        return implode(", ",$names);
    }
}
