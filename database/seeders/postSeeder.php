<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profileIds = DB::table('profiles')->pluck('id')->toArray();

        for ($i = 0; $i <= count($profileIds) - 1; ++$i) {

            \App\Models\Post::factory()->create([
                'profile_id' =>  $profileIds[$i],
            ]);
            //SET USER AS MEMBER WHEN HE CREATES PROFILE
            $user = \App\Models\Profile::find($profileIds[$i] ?? null)->user;
            $user->status = 'member';
            $user->save();
        }
    }
}
