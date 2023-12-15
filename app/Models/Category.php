<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    //nhieu phim, va lay phim moi nhat
    public function movie(){
    	return $this->hasMany(Movie::class,'category_id')->orderBy('id','DESC');
    }
}