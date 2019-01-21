<?php

use Illuminate\Database\Seeder;

class IdentityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Identity', 50)->create()->each(function ($identity){
            $identity->identity_type()->save(factory(App\Models\Identity::class)->make());
            $identity->issuing_entity()->save(factory(App\Models\Identity::class)->make());
        });
    }
}
