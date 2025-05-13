<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $table = 'school_classes';
    protected $primaryKey = 'class_code';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'class_code',
    ];
}
