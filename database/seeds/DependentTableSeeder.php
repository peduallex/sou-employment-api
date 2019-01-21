<?php

use Illuminate\Database\Seeder;

class DependentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Dependent', 50)->create()->each(function ($dependent){
            $dependent->dependent_type()-save(factory(App\Models\Dependent::class)->make());
        });
    }
}
