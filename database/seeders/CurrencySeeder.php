<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["name" => "Egyptian Pound","code" => "EGP"],
            ["name" => "Saudi Arabian Riyals", "code" => "SAR"],
            ["name" => "United States Dollar", "code" => "USD"],
            ["name" => "United Arab Emirates Dirham","code" => "AED"],
            ["name" => "Euro", "code" => "EUR"],
        ];
        // use insert instead of create to make one query instead of multiple queries using create method within loop and that will increase the performance and heave o(1) notation instead of o(n^2)
        Currency::query()->insert($data);
    }
}
