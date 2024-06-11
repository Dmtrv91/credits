<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            // 100 random clients
            Client::insert([
                'first_name' =>  Str::random(6),
                'middle_name' =>  Str::random(6),
                'last_name' =>  Str::random(6),
                'credit_number' =>  'X0X0'.random_int(1000000000, 9999999999),
                'sum_payment' => random_int(100, 80000),
                'monthly_installments' => random_int(3, 120),
                'month_contribution' => rand(100, 80000) / 100,
                'credit_created' => now(),
                'credit_expired' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
       }
    }
}
