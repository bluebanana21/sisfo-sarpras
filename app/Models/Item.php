<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\SubCategory;

class Item extends Model
{
    /**
     * Get the subcategory this item belongs to.
     *
     * @return BelongsTo<SubCategory, Item>
     */
    public function subcategory(): BelongsTo{
        return $this->belongsTo(SubCategory::class);
    }

    protected $fillable = [
        'name',
        'description',
        'image_url',
        'assigned_num',
        'item_type_id',
        'subcategory_id',
        'status',
    ];
}
