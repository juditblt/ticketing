<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets') -> insert([
            'user_id' => 0,
            'category_id' => 0,
            'status' => "received",
            'description' => Str::random(25)
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
