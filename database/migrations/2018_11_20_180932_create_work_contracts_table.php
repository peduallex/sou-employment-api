<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('hiring_date');
            $table->date('end_date');
            $table->date('examination_date');
            $table->date('dismissal_date');
            $table->boolean('flag_fixed_term');
            $table->integer('term');
            $table->date('new_end_date');
            $table->integer('new_term');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_contracts');
    }
}
