<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'device',
        'issue',
        'status',
        'technician_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }


    public function scopeUpcoming($query)
    {
        return $query->whereDate('created_at', '<=', now())
                    ->whereDate('scheduled_date', '>=', now());
    }

}
