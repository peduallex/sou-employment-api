<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipWorkContractTaxBenefit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tax_benefits', function (Blueprint $table){
            $table->integer('work_contract_id')->unsigned();
            $table->foreign('work_contract_id')->references('id')->on('work_contracts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tax_benefits', function (Blueprint $table){
            $table->dropForeign('tax_benefits_work_contract_id_foreign');
            $table->dropColumn('work_contract_id');
        });
    }
}
