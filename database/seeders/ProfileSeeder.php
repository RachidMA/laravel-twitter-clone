<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id')->toArray();

        for ($i = 0; $i <= count($userIds) - 1; ++$i) {
            \App\Models\Profile::factory()->create([
                'user_id' =>  $userIds[$i],
            ]);
        }
    }
}
