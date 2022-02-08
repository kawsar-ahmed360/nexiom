<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counters', function (Blueprint $table) {
            $table->id();
            $table->string('total_donation')->nullable();
            $table->string('total_donation_count')->nullable();
            $table->string('total_project')->nullable();
            $table->string('total_project_count')->nullable();
            $table->string('total_volunteers')->nullable();
            $table->string('total_volunteers_count')->nullable();
            $table->string('total_Projects_two')->nullable();
            $table->string('total_Projects_two_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('counters');
    }
}
