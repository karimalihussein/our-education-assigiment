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
       foreach($data as $currency)
       {
           Currency::updateOrCreate([
               'code' => $currency['code'],
           ],[
               'name' => $currency['name'],
           ]);
       }
    }
}
