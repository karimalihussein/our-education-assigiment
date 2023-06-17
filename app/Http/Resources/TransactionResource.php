<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'      => $this->uuid,
            'status'  => $this->status,
            'amount'  => "$this->amount {$this->user->currency->code}",
            'payment_date' => $this->payment_date->format('Y-m-d'),
        ];
    }
}
