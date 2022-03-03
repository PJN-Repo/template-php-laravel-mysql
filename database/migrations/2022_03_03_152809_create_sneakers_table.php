<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSneakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sneakers', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('colorway');
            $table->string('gender');
            $table->string('name');
            $table->string('releaseDate');
            $table->string('retailPrice');
            $table->string('shoe');
            $table->string('styleId');
            $table->string('title');
            $table->string('year');
            $table->json('media');

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
        Schema::dropIfExists('sneakers');
    }
}
