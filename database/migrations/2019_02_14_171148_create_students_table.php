<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('name');
            $table->string('birthdate');
            $table->integer('age');
            $table->char('shirt_size');
            $table->string('father');
            $table->string('mother');
            $table->string('phone');
            $table->string('address');
            $table->string('lives_with');
            $table->char('responsible');
            $table->string('responsible_rg');
            $table->string('job_father');
            $table->string('job_mother');
            $table->string('religion_father');
            $table->string('religion_mother');
            $table->string('school');
            $table->string('grade');
            $table->boolean('repeat_student');
            $table->boolean('prev_student');
            $table->boolean('health_issue');
            $table->string('which_health_issue')->nullable();
            $table->string('fever_drug');
            $table->string('family_reco');
            $table->boolean('home_alone');
            $table->string('who_takes_home')->nullable();
            $table->boolean('active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
