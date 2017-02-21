<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['name'];
    protected $guarded = ['id'];
    protected $hidden = [''];
    protected $dates = [];
    
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
