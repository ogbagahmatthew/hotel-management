<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    //
//     protected $fillable=['parent_id', 'name'];
//     public function children(){
//         return $this->hasMany('APP\posts', 'parent_id');
//     }
//     public function posts()
// {
//     return $this->hasMany('App\Post');
// }
protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'description'];

public function getRouteKeyName()
{
    return 'slug';
}

public function user() {
    return $this->belongsTo('App\User');
}

public function category() {
    return $this->belongsTo('App\Category');
}
}
