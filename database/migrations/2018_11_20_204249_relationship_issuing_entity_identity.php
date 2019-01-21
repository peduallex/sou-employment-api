<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipIssuingEntityIdentity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('identities', function (Blueprint $table){
            $table->integer('issuing_entity_id')->unsigned();
            $table->foreign('issuing_entity_id')->references('id')->on('issuing_entities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('identities', function (Blueprint $table){
            $table->dropForeign('identities_issuing_entity_id_foreign');
            $table->dropColumn('issuing_entity_id');
        });
    }
}
