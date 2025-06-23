<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class TaskSeeder extends Seeder
{
     public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            $createdAt = Carbon::now()->subDays(rand(1, 100)); // Random date in past 100 days
            $updatedAt = (clone $createdAt)->addDays(rand(0, 10)); // Some time after createdAt

            DB::table('tasks')->insert([
                'title' => "Task Title $i",
                'description' => "Short description for task $i",
                'long_description' => "This is a longer description for task number $i",
                'completed' => rand(0, 1),
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ]);
        }
    }
}
