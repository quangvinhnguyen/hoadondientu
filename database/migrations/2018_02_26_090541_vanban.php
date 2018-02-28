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
            $table->string('sokh')->nullable();
            $table->string('trichyeunoidung')->nullable();
            $table->string('ngaybanhanh')->nullable();
            $table->string('hinhthucvanban')->nullable();
            $table->string('coquanbanhanh')->nullable();
            $table->string('nguoikyduyet')->nullable();
            $table->string('tailieu')->nullable();
      
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
