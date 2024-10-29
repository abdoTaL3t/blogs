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
        Schema::table('posts', function (Blueprint $table) {
            //create column his name user_id that what mean =
            $table->unsignedBigInteger('user_id')->nullable(); 
 
            $table->foreign('user_id')->references('id')->on('users'); //premir key here is id on users 
        });
    }

  
};