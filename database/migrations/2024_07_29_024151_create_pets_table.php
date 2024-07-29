a<?php

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
        Schema::create('pets', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 100);  // 文字列カラム。最大長を100に設定
            $table->integer('f_cost');    // 整数カラム。最大長は指定しない
            $table->integer('category');  // 整数カラム。最大長は指定しない
            $table->integer('caution_flg')->default(0);  // 整数カラム。デフォルト値を0に設定
            $table->boolean ('np_flg')->default(1);   // デフォルト値を1に設定
            $table->boolean ('display')->default(1); 
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
        Schema::dropIfExists('pets');
    }
};
