<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    
    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'image',
        'categori_id'
    ];

    public function categori()
{
    return $this->belongsTo(Categoris::class, 'categori_id');
}

}