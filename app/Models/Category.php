<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function dishes(): HasMany
    {
        return $this->hasMany(Dish::class);
    }

    public function activeDishes(): HasMany
    {
        return $this->hasMany(Dish::class)->where('is_available', true);
    }

    public function getDishesCountAttribute()
    {
        return $this->dishes()->count();
    }
}
