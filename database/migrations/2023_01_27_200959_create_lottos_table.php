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
        Schema::create('lottos', function (Blueprint $table) {
            $table->id();
            $table->year("year");
            $table->integer("week");
            $table->date('date')->nullable();
            $table->tinyInteger('nr1')->nullable();
            $table->tinyInteger('nr2')->nullable();
            $table->tinyInteger('nr3')->nullable();
            $table->tinyInteger('nr4')->nullable();
            $table->tinyInteger('nr5')->nullable();
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
        Schema::dropIfExists('lottos');
    }
};
