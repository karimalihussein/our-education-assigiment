<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    public $timestamps = false;

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }
}
