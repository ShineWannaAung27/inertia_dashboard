<?php

namespace App\Models;

use App\Models\Scope\CustomerScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory, CustomerScope;
    protected $guarded = [];
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
