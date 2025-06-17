<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resident = 15;

        $paymentTerm = ['Lunas', 'Belum Lunas'];

        $timeOptions = ['Bulanan', 'Tahunan'];

        for ($resident_id = 1; $resident_id <= $resident; $resident_id++) {
            $security_term = $paymentTerm[array_rand($paymentTerm)];
            $cleaning_term = $paymentTerm[array_rand($paymentTerm)];

            $security_time = $timeOptions[array_rand($timeOptions)];
            $cleaning_time = $timeOptions[array_rand($timeOptions)];

            $security_price = $security_time === 'Tahunan' ? 100000 * 12 : 100000;
            $cleaning_price = $cleaning_time === 'Tahunan' ? 15000 * 12 : 15000;

            DB::table('payment_history')->insert([
                'residents_id' => $resident_id,
                'security_term' => $security_term,
                'security_time' => $security_time,
                'security_price' => $security_price,
                'cleaning_term' => $cleaning_term,
                'cleaning_time' => $cleaning_time,
                'cleaning_price' => $cleaning_price,
                'slug' => 'penghuni-'.$resident_id,
                'created_at' => now()->subDays(rand(0, 30)),
                'updated_at' => now(),
            ]);
        }
    }
}
