<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $categories = ['Lifestyle', 'University', 'Homeworks', 'Others'];
        foreach ($categories as $category) {
            DB::table("categories")->insert([
                'name' => $category,
                'created_at' =>Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
