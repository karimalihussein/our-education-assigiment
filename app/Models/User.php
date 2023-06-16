<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'currency_id',
        'created_at'
    ];

    public function currency(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function balances(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Balance::class);
    }

    public static function boot(): void
    {
        parent::boot();
        static::creating(function (User $user) {
            $user->uuid = $user->uuid ?: \Illuminate\Support\Str::random(4) . '-' . \Illuminate\Support\Str::random(4);
        });
    }
}
