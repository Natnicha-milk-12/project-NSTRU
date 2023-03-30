<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accidents', function (Blueprint $table) {
            $table->id();
            $table->text('accidents_name');
            $table->string('accidents_categors_name');
            $table->text('location');
            $table->date('accidents_date');
            $table->time('accidents_time_start');
            $table->time('accidents_time_end');
            $table->text('details');
            $table->text('effect');
            $table->text('solutions');
            $table->string('follower_name');
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
        Schema::dropIfExists('accidents');
    }
}
