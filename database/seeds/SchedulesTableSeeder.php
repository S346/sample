<?php

use Illuminate\Database\Seeder;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            [
                'title' => 'Mao帰国パーティー',
                'body' => 'PhatPackのMC Maoが10ヶ月のグルーヴ留学からついに帰還！',
                'date' => '2018-3-10',
                'open' => '17:00',
                'start' => '18:00',
                'charge' => 1000,
                'created_at' => '2018-02-18 14:28:19',
                'updated_at' => '2018-02-18 14:28:19'
            ],[
                'title' => '船上パーティー',
                'body' => '',
                'date' => '2018-03-03',
                'open' => '18:00',
                'start' => '18:30',
                'charge' => 2000,
                'created_at' => '2018-02-18 14:28:19',
                'updated_at' => '2018-02-18 14:28:19'
            ]
        ]);
    }
}
