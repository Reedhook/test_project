<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->string('artist');
            $table->text('name');
            $table->integer('minutes')->nullable();
            $table->integer('seconds')->nullable();
            $table->integer('milliseconds')->nullable();
            $table->string('bpm');
            $table->string('link_to_the_file');


            $table->unsignedBigInteger('album_id');

            $table->foreign('album_id','track_album_fk')->on('albums')->references('id');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracks');
    }
};
