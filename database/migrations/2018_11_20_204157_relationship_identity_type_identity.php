<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipIdentityTypeIdentity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('identities', function (Blueprint $table){
            $table->integer('identity_type_id')->unsigned();
            $table->foreign('identity_type_id')->references('id')->on('identity_types')->onDelete('cascade');
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
            $table->dropForeign('identities_identity_type_id_foreign');
            $table->dropColumn('identity_type_id');
        });
    }
}
