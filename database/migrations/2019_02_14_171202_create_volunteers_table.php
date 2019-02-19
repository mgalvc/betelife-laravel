<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('name');
            $table->string('birthdate');
            $table->integer('age');
            $table->string('schooling', 2);
            $table->string('address');
            $table->string('phone');
            $table->string('whatsapp')->nullable();
            $table->string('email');
            $table->string('rg');
            $table->string('cpf');
            $table->string('church');
            $table->string('pastor');
            $table->string('ministry');
            $table->boolean('use_medicine')->default(false);
            $table->string('which_medicine')->nullable();
            $table->string('why_medicine')->nullable();
            $table->boolean('medical_monitored')->default(false);
            $table->string('why_medical_monitored')->nullable();
            $table->boolean('prev_volunteer')->default(false);
            $table->string('where_volunteer')->nullable();
            $table->string('experience_as_volunteer')->nullable();
            $table->string('what_is_volunteering');
            $table->string('volunteering_principles');
            $table->char('obedient');
            $table->string('obedient_desc');
            $table->string('must_not_do');
            $table->string('expectations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteers');
    }
}
