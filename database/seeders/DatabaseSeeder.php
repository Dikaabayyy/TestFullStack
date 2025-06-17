<?php

namespace Database\Seeders;

use App\Models\PaymentHistory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(HouseSeeder::class);
        $this->call(ResidentSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(PaymentHistorySeeder::class);
    }
}
