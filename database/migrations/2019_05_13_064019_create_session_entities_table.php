<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('session_entities');
        Schema::create('session_entities', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('last_join_time')->nullable();
            $table->softDeletes();
            $table->string('name')->nullable();
            $table->boolean('name_hidden')->default(false);
            $table->boolean('hidden')->default(false);
            $table->enum('type', ['Player', 'NPC', 'Enemy', 'Legendary_Enemy']);
            $table->unsignedInteger('initiative')->nullable();
            $table->unsignedInteger('current_hp')->nullable();
            $table->unsignedInteger('temp_hp')->nullable();
            $table->unsignedInteger('max_hp')->nullable();
            $table->string('token')->nullable();
            $table->unsignedInteger('character_id')->nullable();
            $table->unsignedInteger('session_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('character_id')->references('id')->on('characters');
            $table->foreign('session_id')->references('id')->on('sessions');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('session_entities', function(Blueprint $table)
        {
            $table->dropForeign(['character_id']);
            $table->dropForeign(['session_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('session_entities');
    }
}
