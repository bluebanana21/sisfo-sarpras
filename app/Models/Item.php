<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'assigned_num',
        'type',
        'status',
        'category_id',
        'subcat_id',
    ];
}
