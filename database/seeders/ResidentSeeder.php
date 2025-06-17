<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = ['Pria', 'Wanita'];
        $resident_status = ['Kontrak', 'Tetap'];
        $married = ['Menikah', 'Belum Menikah'];

        for ($i = 1; $i <= 15; $i++) {
            $name  = 'Penghuni ' . $i;
            $slug = Str::slug($name);

            DB::table('residents')->insert([
                'name' => 'Penghuni ' . $i,
                'gender' => $genders[array_rand($genders)],
                'resident_status' => $resident_status[array_rand($resident_status)],
                'phone' => '08' . rand(1111111111, 9999999999),
                'married' => $married[array_rand($married)],
                'houses_id' => $i,
                'img_name' => 'images/profile/profile-img.png',
                'slug' => $slug,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
