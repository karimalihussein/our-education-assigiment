<?php

namespace App\Models;

use App\Models\Balance;
use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Baro\PipelineQueryCollection\ScopeFilter;
use Baro\PipelineQueryCollection\DateToFilter;
use Baro\PipelineQueryCollection\DateFromFilter;
use Baro\PipelineQueryCollection\RelationFilter;
use Baro\PipelineQueryCollection\Concerns\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    public function scopeFilterAmoutRange($query): void
    {
        $request = app(Request::class);
        if ($request->has('amount_from') && $request->has('amount_to')) {
            $query->whereHas('balances', function ($query) use ($request) {
                $query->whereBetween('amount', [$request->amount_from, $request->amount_to]);
            });
        }
    }

    public function scopeSearch(Builder $query, string $keyword): Builder
    {
        return $query->where('name', 'like', '%'.$keyword.'%')->orWhere('email', 'like', '%'.$keyword.'%');
    }


    public function getFilters(): array
    {
        return [
            new ScopeFilter('search'),
           (new RelationFilter('currency', 'code')),
           (new RelationFilter('transactions', 'status')),
           (new DateFromFilter('created_at')),
           (new DateToFilter('created_at')),
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
