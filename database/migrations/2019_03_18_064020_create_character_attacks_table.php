<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterAttacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('character_attacks');
        Schema::create('character_attacks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('quantity')->default(0);
            $table->enum('resets_on', ['StartOfYourTurn', 'EndOfYourTurn', 'ShortRest', 'LongRest', 'Dawn', 'Dusk', 'NotApplicable'])->nullable();
            $table->integer('character_id')->unsigned();
            $table->foreign('character_id')->references('id')->on('characters')->onDelete('no action');
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
        Schema::dropIfExists('character_attacks');
    }
}
