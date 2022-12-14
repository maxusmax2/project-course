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
        Schema::create('favorite_builds', function (Blueprint $table) {
            $table->id();
            $table->string("user_token",100);
            $table->unsignedBigInteger('build_id');
            $table->string('build_type');
            $table->timestamps();
            $table->fullText('user_token','build_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorite_builds');
    }
};
