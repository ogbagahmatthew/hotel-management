<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable=['name', 'description', 'price', 'quantity', 'size', 'image', 'category_id'];
    public function children(){
        return $this->hasMany('APP\products', 'parent_id');
    }
public function category()
{
    return $this->hasMany('App\category');
}
}
