<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vanban extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vanban', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sokh')->unique();
            $table->string('trichyeunoidung')->unique();
            $table->date('ngaybanhanh')->nullable();
            $table->string('hinhthucvanban')->unique();
            $table->string('coquanbanhanh')->unique();
            $table->string('nguoikyduyet')->unique();
            $table->string('tailieu')->unique();
      
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
        //
    }
}
