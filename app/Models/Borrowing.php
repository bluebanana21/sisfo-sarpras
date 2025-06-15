<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $fillable = [
            'borrower_id',
            'item_id',
        'reason',
        'return_date',
            'approval_status' ,
            'approved_by'
    ];
}
