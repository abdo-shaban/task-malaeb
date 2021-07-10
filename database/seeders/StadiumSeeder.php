<?php

namespace Database\Seeders;

use App\Models\Stadium;
use App\Models\StadiumPitch;
use Illuminate\Database\Seeder;

class StadiumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stadium::factory()
            ->count(2)
            ->create()
            ->each(function (Stadium $stadium) {
                StadiumPitch::factory()->count(3)->create(['stadium_id' => $stadium]);
            });
    }
}
