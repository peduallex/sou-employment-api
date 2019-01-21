<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipMaritalStatusEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table){
            $table->integer('marital_status_id')->unsigned();
            $table->foreign('marital_status_id')->references('id')->on('marital_statuses')->onDelete('cascade');
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
            $table->dropForeign('employees_marital_status_id_foreign');
            $table->dropColumn('marital_status_id');
        });
    }
}
