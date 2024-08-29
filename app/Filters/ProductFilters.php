<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductFilters extends QueryFilterBase
{

    public function name($term)
    {
        return $this->builder->where('name', 'like', '%' . $term . '%');
    }
    public function quantity($term)
    {
        return $this->builder->where('quantity', $term);
    }
    public function status($term)
    {
        return $this->builder->where('status', $term);
    }
    public function price($term)
    {
        return $this->builder->where('price', 'like', '%' . $term . '%');
    }

}
