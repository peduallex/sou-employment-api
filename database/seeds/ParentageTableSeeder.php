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
      $parentage_types = App\Models\ParentageType::all();
      factory('App\Models\Parentage', 50)->create()->each(function ($parentage) use ($parentage_types){
          $parentage->parentage_type_id = $parentage_types->random()->parentage_type_id;
      });
    }
}
