<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactions = public_path('json/transactions.json');
        $transactions = json_decode(file_get_contents($transactions), true)['transactions'];
        foreach($transactions as $transaction){
            $user = User::query()->where('email', $transaction['parentEmail'])->first();
            Transaction::create([
                'uuid' => $transaction['parentIdentification'],
                'user_id' => $user->id,
                'amount' => $transaction['paidAmount'],
                'status' => $transaction['statusCode'],
                'payment_date' => $transaction['paymentDate']
            ]);
        }
    }
}
