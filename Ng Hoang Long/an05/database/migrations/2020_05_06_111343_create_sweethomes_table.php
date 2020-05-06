<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSweethomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sweethomes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->String('address');
            $table->integer('price');
            $table->text('information');
            $table->text('details');
            $table->String('cover');
            $table->boolean('is_active');

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
        Schema::dropIfExists('sweethomes');
    }
}
