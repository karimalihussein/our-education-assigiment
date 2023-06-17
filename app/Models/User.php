<?php

namespace App\Models;

use App\Models\Balance;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Baro\PipelineQueryCollection\Concerns\Filterable;
use Baro\PipelineQueryCollection\Contracts\CanFilterContract;

class User extends Model
{
    use HasFactory, Notifiable, Filterable;

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

    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function getBalanceAttribute(): float
    {
        return $this->balances()->sum('amount');
    }

    public function getFilters(): array
    {
        return [
           
        ];
    }

    public static function boot(): void
    {
        parent::boot();
        static::creating(function (User $user) {
            $user->uuid = $user->uuid ?: \Illuminate\Support\Str::random(4) . '-' . \Illuminate\Support\Str::random(4);
        });
    }
}
