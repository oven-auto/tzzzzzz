<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'status'];

    public const STATUSES = [
        'work', 'confirm', 'abort'
    ];



    /**
     * RELATIONS
     */

    public function client()
    {
        return $this->hasOne(\App\Models\Client::class, 'id', 'client_id')->withDefault();
    }



    public function products()
    {
        return $this->belongsToMany(\App\Models\Product::class, 'order_products', 'order_id', 'product_id', 'id')
            ->withPivot(['count','price']);
    }
}
