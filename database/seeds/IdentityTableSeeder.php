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
        $identity_types = App\Models\IdentityType::all();
        $issuing_entities = App\Models\IssuingEntity::all();
        factory('App\Models\Identity', 50)->create()->each(function ($identity) use (
            $identity_types, $issuing_entities){
            $identity->identity_type_id = $identity_types->random()->identity_type_id;
            $identity->issuing_entity_id = $issuing_entities->random()->issuing_entity_id;
        });
    }
}
