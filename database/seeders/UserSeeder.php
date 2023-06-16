<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = public_path('json/users.json');
        $users = json_decode(file_get_contents($users), true)['users'];
        foreach($users as $user)
        {
            $currency = Currency::where('code', $user['currency'])->first();
            $created_at = str_replace('/', '-', $user['created_at']);
            $created_at = date('Y-m-d H:i:s', strtotime($created_at));
            $user2 = User::create([
                'name' => fake()->name(),
                'email' => $user['email'],
                'uuid' => $user['id'],
                'currency_id' => $currency->id,
                'created_at' => $created_at
            ]);
            $balance = $user['balance'];
            $user2->balances()->create([
                'amount' => $balance,
                'type'   => 'deposit'
            ]);
        }
    }
}
