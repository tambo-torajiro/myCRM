<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            [
                'name' => '田中一郎',
                'tel' => '08008000800',
                'employee_status' => '1',
                'emergency_name' => '田中耕三',
                'emergency_contact' => '09009900999',
                'emergency_relation' => '父',
            ],
            [
                'name' => '佐藤次郎',
                'tel' => '08008000700',
                'employee_status' => '2',
                'emergency_name' => '佐藤聡子',
                'emergency_contact' => '09007700999',
                'emergency_relation' => '母',
            ],
            [
                'name' => '鈴木田郎',
                'tel' => '08008000600',
                'employee_status' => '3',
                'emergency_name' => '鈴木隆司',
                'emergency_contact' => '09007600999',
                'emergency_relation' => '兄',
            ],
            ]);
    }
}