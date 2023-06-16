<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'currency_id',
    ];

    public function currency(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public static function boot(): void
    {
        parent::boot();
        static::creating(function (User $user) {
            $user->uuid = \Illuminate\Support\Str::random(4) . '-' . \Illuminate\Support\Str::random(4);
        });
    }
}
