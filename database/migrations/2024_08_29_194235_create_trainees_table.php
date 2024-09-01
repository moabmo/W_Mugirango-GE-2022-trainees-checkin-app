<?php
// database/migrations/xxxx_xx_xx_create_trainees_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraineesTable extends Migration
{
    public function up()
    {
        Schema::create('trainees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('id_number')->unique();
            $table->string('phone_number');
            $table->string('polling_station');
            $table->enum('role', ['polling_clerk', 'presiding_officer', 'deputy_presiding_officer', 'SET']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trainees');
    }
}
