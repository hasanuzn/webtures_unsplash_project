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
        Schema::create('photos_urls', function (Blueprint $table) {
            $table->id();
            $table->integer('photo_id');
            $table->string('raw');
            $table->string('full');
            $table->string('regular');
            $table->string('small');
            $table->string('thumb');
            $table->string('small_s3');
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
        Schema::dropIfExists('photos_urls');
    }
};
