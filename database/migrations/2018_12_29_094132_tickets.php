<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string('kode_tkt')->nullable();
            $table->string('source')->nullable();
            $table->string('destination')->nullable();
            $table->unsignedInteger('maskapai_id')->nullable();
            $table->foreign('maskapai_id')->references('id')->on('maskapai')->onDelete('cascade');
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->text('image')->nullable();
            $table->string('desc')->nullable();
            $table->double('price')->nullable();
            $table->integer('stock')->nullale();
            $table->date('takeoff_date')->nullable();
            $table->time('takeoff_time')->nullable();
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
        Schema::drop('tickets');
    }
}
