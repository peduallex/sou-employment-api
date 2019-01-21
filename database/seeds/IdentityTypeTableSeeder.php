<?php

use Illuminate\Database\Seeder;

class IdentityTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\IdentityType', 50)->create();
    }
}
