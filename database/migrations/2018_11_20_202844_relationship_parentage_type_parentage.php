<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipParentageTypeParentage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parentages', function (Blueprint $table){
            $table->integer('parentage_type_id')->unsigned();
            $table->foreign('parentage_type_id')->references('id')->on('parentage_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parentages', function (Blueprint $table){
            $table->dropForeign('parentages_parentage_type_id_foreign');
            $table->dropColumn('parentage_type_id');
        });
    }
}
