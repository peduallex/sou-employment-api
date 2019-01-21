<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipEthnicityEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table){
            $table->integer('ethnicity_id')->unsigned();
            $table->foreign('ethnicity_id')->references('id')->on('ethnicities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table){
            $table->dropForeign('employees_ethnicity_id_foreign');
            $table->dropColumn('ethnicity_id');
        });
    }
}
