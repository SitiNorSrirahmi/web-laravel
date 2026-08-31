<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['nama', 'deskripsi', 'harga', 'stok'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
