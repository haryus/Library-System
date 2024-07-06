<?php

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
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->unsignedBigInteger('author');
            $table->foreign('author')->references('id')->on('authors')->onDelete('cascade');
            $table->text('isbn');
            $table->unsignedBigInteger('genre');
            $table->foreign('genre')->references('id')->on('genres')->onDelete('cascade');
            $table->text('publisher');
            $table->integer('publisherYear');
            $table->decimal('price', 10, 2);
            $table->integer('stockQuantity');
            $table->string('img')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
