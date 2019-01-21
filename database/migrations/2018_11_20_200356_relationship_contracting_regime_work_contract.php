<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipContractingRegimeWorkContract extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_contracts', function (Blueprint $table){
            $table->integer('contracting_regime_id')->unsigned();
            $table->foreign('contracting_regime_id')->references('id')->on('contracting_regimes')->onDelete('cascade');
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
            $table->dropForeign('work_contracts_contracting_regime_contract_name_id_foreign');
            $table->dropColumn('contracting_regime_contract_name_id');
        });
    }
}
