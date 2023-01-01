<?php

namespace Database\Seeders;

use App\Models\EventStatistic;
use Illuminate\Database\Seeder;

class EventStatisticSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = new EventStatistic();
        $event->save();
    }
}
