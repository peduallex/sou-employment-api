<?php

use Illuminate\Database\Seeder;

class IssuingEntityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\IssuingEntity', 50)->create();
    }
}
