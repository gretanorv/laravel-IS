<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('surname', 30);
            $table->timestamps();
            $table->foreignId('project_id')->references('id')->on('projects');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
