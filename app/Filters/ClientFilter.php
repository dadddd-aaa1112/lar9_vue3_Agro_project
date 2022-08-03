<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ClientFilter extends QueryFilter
{
    public function search_title($search_string = '')
    {
        return $this->builder->when($search_string, function($query) use($search_string) {
           $query->where('title', 'LIKE', '%'. $search_string .'%');
        });
    }

    public function region_filter($values = null) {
        return $this->builder->when($values, function($query) use($values) {
            $query->whereIn('id', $values);
        });
    }

    public function dateMin($value = null) {
        return $this->builder->when($value, function($query) use($value) {
            $query->where('date_order', '>=', $value);
        });
    }

    public function dateMax($value = null) {
        return $this->builder->when($value, function($query) use($value) {
           $query->where('date_order', '<=', $value);
        });
    }

    public function costMin($value = null) {
        return $this->builder->when($value, function($query) use($value) {
            $query->where('cost', '>=', $value);
        });
    }

    public function costMax($value = null) {
        return $this->builder->when($value, function($query) use($value) {
            $query->where('cost', '<=', $value);
        });
    }
}
