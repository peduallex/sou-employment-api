<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipAddressWorkContract extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_contracts', function (Blueprint $table){
            $table->integer('address_id')->unsigned();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('work_contracts', function (Blueprint $table){
            $table->dropForeign('work_contracts_address_id_foreign');
            $table->dropColumn('address_id');
        });
    }
}
