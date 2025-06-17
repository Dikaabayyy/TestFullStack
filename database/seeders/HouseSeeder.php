<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HouseSeeder extends Seeder
{
    public function run()
    {
        $paymentTerm = ['Lunas', 'Belum Lunas'];
        for ($i = 1; $i <= 20; $i++) {

            if ($i <= 15){
                $residentOpt = 'Berpenghuni';
            }else{
                $residentOpt = 'Tidak Berpenghuni';
            }

            $name = 'Rumah ' . $i;
            $resident = 'Penghuni ' . $i;
            $slug = Str::slug($name);

            DB::table('houses')->insert([
                'name' => $name,
                'resident_status' => $residentOpt,
                'address' => 'Jl. Contoh No. ' . $i,
                'resident_history' => $resident,
                'slug' => $slug,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

