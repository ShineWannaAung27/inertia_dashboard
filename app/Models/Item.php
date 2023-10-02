<?php

namespace App\Models;

use App\Models\Scope\ItemScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use League\Glide\Server;

class Item extends Model
{
    use HasFactory, ItemScope;
    protected $guarded = [];
    
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function setPhotoAttribute($photo)
    {
        if(!$photo) return;

        $this->attributes['photo_path'] = $photo instanceof UploadedFile ? $photo->store('users') : $photo;
    }

    public function getPhotoAttribute() {
        return $this->photoUrl(['w' => 40, 'h' => 40, 'fit' => 'crop']);
    }

    public function photoUrl(array $attributes)
    {
        if ($this->photo_path) {
            return URL::to(App::make(Server::class)->fromPath($this->photo_path, $attributes));
        }
    }
}
