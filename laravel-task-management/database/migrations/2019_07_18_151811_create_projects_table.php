<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;




class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('owner_id'); //positive integer
            $table->string('title');
            $table->text('description');
            $table->timestamps();

             //  owner_id refers to the user id on the users table
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
           
         
            // in the case the user is deleted, cascade down and delete all user's projects
        });
    }

    /**
     * Reverse the migrations. -> function that is run with the roll back order
     *
     * @return void
     */

    // migrate fresh doesn't run the down function

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
