<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                DB::table('vehicles')->insert([
            [
                'type' => '軽トラ',
                'car_number' => '足立55 ほ
                3524',
                'body_type' => 'AE86',
                'registration_date' => '2017-03',
                'inspection_date' => '2023-03',
                'start_milage' => '50000',
            ],
            [
                'type' => '2t平',
                'car_number' => '足立200 こ
                1234',
                'body_type' => 'AHO963',
                'registration_date' => '2007-06',
                'inspection_date' => '2023-06',
                'start_milage' => '120000',
            ],
            [
                'type' => 'スーパーカー',
                'car_number' => '足立301 た
                0298',
                'body_type' => 'KFC69',
                'registration_date' => '2018-10',
                'inspection_date' => '2024-10',
                'start_milage' => '350',
            ],
            ]);
    }
}