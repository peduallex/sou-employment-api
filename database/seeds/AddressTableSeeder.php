<?php

use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Address', 50)->create()->each(function ($address){
            $address->city()-save(factory(App\Models\Address::class)->make());
        });
    }
}
