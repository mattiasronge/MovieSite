<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_movie', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('agent_id')->unsigned()->nullable();
      
            $table->bigInteger('movie_id')->unsigned()->nullable();
    
            $table->timestamps();        
        });

        Schema::table('agent_movie', function($table) {
            $table->foreign('agent_id')->references('id')
                  ->on('agents')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')
                  ->on('movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_movie');
    }
}
