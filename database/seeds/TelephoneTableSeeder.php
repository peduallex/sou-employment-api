<?php

use Illuminate\Database\Seeder;

class TelephoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Telephone', 50)->create();
    }
}
