<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'client_email',
        'partner_id',
        'status',
    ];
    
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
        return $this->getStatusesList()[$status_id];
    }
    
    public function getStatusesList()
    {
        return ['0' => __('system.new'), '10' => __('system.confirmed'), '20' => __('system.completed')];
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
    public function getProductsList()
    {
        $products = $this->products;
        $list = [];
        foreach ($products as $index => $product) {
            $list[$index]['name'] = $product->name;
            $list[$index]['quantity'] = $product->pivot->quantity;
        }
        return $list;
    }
    
    
}
