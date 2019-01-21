<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('last_name', 150);
            $table->date('birth_date');
            $table->char('gender', 1);
            $table->string('cpf', 14);
            $table->char('blood_type', 3);
            $table->boolean('organ_donor');
            $table->string('assumed_name', 150);
            $table->boolean('flag_pwd');
            $table->boolean('flag_visually');
            $table->boolean('flag_hearing');
            $table->boolean('flag_physically');
            $table->boolean('flag_intellectually');
            $table->string('description_other_pwd', 400);
            $table->char('first_job_ctps', 4);
            $table->char('first_job_public', 4);
            $table->char('icd', 10);
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
        Schema::dropIfExists('employees');
    }
}
