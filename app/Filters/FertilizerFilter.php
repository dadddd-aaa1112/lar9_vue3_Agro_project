<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class FertilizerFilter extends QueryFilter
{

    public function search_field($search_string = '')
    {
        return $this->builder->when($search_string, function ($query) use ($search_string) {
            $query->where('title', 'LIKE', '%' . $search_string . '%')
                ->orWhere('description', 'LIKE', '%' . $search_string . '%')
                ->orWhere('target', 'LIKE', '%' . $search_string . '%');
        });
    }

    public function culturesFilter($values = null)
    {
        return $this->builder->when($values, function ($query) use ($values) {
            $query->whereIn('culture_id', $values);
        });
    }

    public function raionsFilter($values = null)
    {
        return $this->builder->when($values, function ($query) use ($values) {
            $query->whereIn('id', $values);
        });
    }

    public function costMin($value = 0)
    {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('cost', '>=', $value);
        });
    }

    public function costMax($value = 999999999999)
    {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('cost', '<=', $value);
        });
    }

    public function normAzotMin($value = 0)
    {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('norm_azot', '>=', $value);
        });
    }

    public function normAzotMax($value = 999999999999)
    {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('norm_azot', '<=', $value);
        });
    }

    public function normFosforMin($value = 0)
    {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('norm_fosfor', '>=', $value);
        });
    }

    public function normFosforMax($value = 999999999999)
    {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('norm_fosfor', '<=', $value);
        });
    }

    public function normKaliiMin($value = 0)
    {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('norm_kalii', '>=', $value);
        });
    }

    public function normKaliiMax($value = 999999999999)
    {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('norm_kalii', '<=', $value);
        });
    }
}
