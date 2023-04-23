<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追加するとseederを利用したデータ生成が可能

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
         for($i = 1; $i <= 100; $i++) {
            DB::table('tasks')->insert([
                'status' => 'test status ' . $i,
                'content' => 'test content ' . $i
            ]);
        }
    }
}
