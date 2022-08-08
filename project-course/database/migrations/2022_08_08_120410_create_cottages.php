<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cottages', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number');
            $table->longText('description');

            $table->integer('cost');
            $table->integer('cost_per_meter');


            $table->float('living_space');
            $table->float('total_area');
            $table->float('kitchen_area');
            $table->float('land_area');
            $table->float('height');
            $table->integer('floors');

            $table->integer('number_of_rooms');

            $table->string('object_type');
            $table->string('state');
            $table->string('building_type');

            $table->string('city_name');
            $table->string('district_name');
            $table->string('street_name');
            $table->integer('building_number');
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
        Schema::dropIfExists('cottages');
    }
};
