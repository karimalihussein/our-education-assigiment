<?php

namespace App\Models;

use App\Models\User;
use App\Enums\TransactionStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        'status',
        'amount',
        'payment_date'
    ];

    protected $casts = [
        'payment_date' => 'datetime',
        'status' => TransactionStatus::class
    ];

    public function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => TransactionStatus::tryFrom($value)->label(),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
