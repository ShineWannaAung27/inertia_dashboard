<?php

namespace App\Models;

use App\Models\Scope\ItemScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory, ItemScope;
    protected $guarded = [];
    
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
