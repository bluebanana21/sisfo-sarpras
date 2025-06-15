<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemReturn extends Model
{
    public function borrowing() {
        return $this->belongsTo('App\Models\Borrowing', 'borrowing_id', 'id');
    }
    protected $fillable = [
        'borrowing_id',
        'return_status',
        'fine'
    ];
}
