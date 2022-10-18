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
        Schema::create('photographers', function (Blueprint $table) {
            $table->id();
            $table->string('unsplash_id');
            $table->string('username');
            $table->string('name');
            $table->string('profile_url');
            $table->string('image')->nullable();
            $table->string('total_likes');
            $table->string('total_photos');
            $table->string('location')->nullable();
            $table->string('bio',1000)->nullable();
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
        Schema::dropIfExists('photographers');
    }
};
