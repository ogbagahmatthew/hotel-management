<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
class Category extends Model
{
    protected $fillable=['parent_id', 'name'];
    public function children(){
        return $this->hasMany('APP\Category', 'parent_id');
    }
public function posts()
{
    return $this->hasMany('App\posts');
}
}

