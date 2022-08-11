<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function Subcategory() {
        return $this->belongsTo('App\Subcategory');
    }

    public function Brand() {
        return $this->belongsTo('App\Brand');
    }

    public function Category() {
        return $this->belongsTo('App\Category');
    }

    //
}
