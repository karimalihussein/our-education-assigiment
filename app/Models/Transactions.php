<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        'status',
        'amount',
        'payment_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
