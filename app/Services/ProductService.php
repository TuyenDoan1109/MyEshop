<?php 

namespace App\Services;

use App\Models\Product;

class ProductService 
{
    public function getAll($orderBys = [], $limit = 5) {
        $query = Product::query();
        if($orderBys) {
            $query->orderBy($orderBys['column'], $orderBys['sort']);
        }
        return $query->paginate($limit);
    }

}