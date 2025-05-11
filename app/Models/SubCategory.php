<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    protected $fillable = [
        'name',
        'category_id',
    ];
}
