<?php

use Illuminate\Database\Seeder;

class ParentageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Parentage', 50)->create()->each(function ($parentage){
            $parentage->parentage_type()->save(factory(App\Models\Parentage::class)->make());
        });
    }
}
