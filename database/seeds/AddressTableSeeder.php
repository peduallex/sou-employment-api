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
        $cities = App\Models\City::all();
        factory('App\Models\Address', 50)->create()->each(function ($address) use ($cities){
            $address->city_id = $cities->random()->city_id;
        });
    }
}
