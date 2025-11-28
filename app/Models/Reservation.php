<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'reservation_date',
        'reservation_time',
        'guests_count',
        'special_requests',
        'status'
    ];

    protected $casts = [
        'reservation_date' => 'date',
    ];

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class, 'reservation_dish')
                    ->withPivot('quantity', 'special_requests')
                    ->withTimestamps();
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }
}
