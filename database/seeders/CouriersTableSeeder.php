<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $couriers = [
            ['code' => 'jne', 'name' => 'JNE'],
            ['code' => 'tiki', 'name' => 'TIKI'],
            ['code' => 'pos', 'name' => 'POS Indonesia']
        ];

        DB::table('couriers')->insert($couriers);
    }
}
