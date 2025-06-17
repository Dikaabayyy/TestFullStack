<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $payments = [
            [
                'name' => 'Satpam',
                'payment_price' => 100000,
                'payment_term' => 'Bulanan',
                'slug' => 'security',
            ],
            [
                'name' => 'Kebersihan',
                'payment_price' => 15000,
                'payment_term' => 'Bulanan',
                'slug' => 'cleaning',
            ],
        ];

        foreach ($payments as $payment) {
            DB::table('payments')->insert([
                'name' => $payment['name'],
                'payment_price' => $payment['payment_price'],
                'payment_term' => $payment['payment_term'],
                'slug' => $payment['slug'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
