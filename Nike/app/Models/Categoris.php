<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoris extends Model
{
    use HasFactory;

    protected $table = 'Categoris';
    protected $fillable = ['jenis'];

    public function products(){
        return $this->hasMany(products::class,'id');
    }
}