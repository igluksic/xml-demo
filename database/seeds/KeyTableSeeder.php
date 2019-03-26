<?php

use Illuminate\Database\Seeder;

class KeyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('api_keys')
            ->insert(['key' => 'H50y33eUcs3NeqZ4hNwraHKllfisW55d', 'vendor_id'=> 764]);
    }
}