<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function Category() {
        return $this->belongsTo('App\Models\Category');
    } 

    public function Products() {
        return $this->hasMany('App\Models\Product');
    }
}
