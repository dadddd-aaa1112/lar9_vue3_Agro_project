<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sortable;

    protected $guarded = false;
    protected $table = 'clients';
    protected $dates = ['deleted_at'];

    public $sortable = ['title', 'cost'];
}
