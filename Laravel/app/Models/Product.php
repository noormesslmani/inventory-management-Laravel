<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'image',
        'description',
        'owner_id',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class, 'product_id');
    }

    public function unsoldItems(): HasMany
    {
        return $this->hasMany(Item::class, 'product_id')->where('is_sold', false);

    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class,'owner_id' );
    }

}

