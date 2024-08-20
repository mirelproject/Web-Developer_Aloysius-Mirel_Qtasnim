<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'stock', 'type_id'];

    public function type()
    {
        return $this->belongsTo(ItemType::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
