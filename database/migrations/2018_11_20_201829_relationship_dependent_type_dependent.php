<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipDependentTypeDependent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dependents', function (Blueprint $table){
            $table->integer('dependent_type_id')->unsigned();
            $table->foreign('dependent_type_id')->references('id')->on('dependent_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dependents', function (Blueprint $table){
            $table->dropForeign('dependents_dependent_type_id_foreign');
            $table->dropColumn('dependent_type_id');
        });
    }
}
