<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'amount', 'price', 'category_id'];
    protected $guarded = ['id'];
    protected $hidden = [''];
    protected $dates = [];
    
    
    protected $casts = [
        'amount' => 'integer'
    ];
    
    // One to One
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    
    //Accessors
    public function getAmountAttribute($value)
    {
        if ($value == null) {
            return '0';
        } else {
            return $value;
        }        
    }
    
}
