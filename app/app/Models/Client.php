<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'email', 'score'];



    /**
     * RELATIONS
     */

    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'client_id', 'id');
    }
}
