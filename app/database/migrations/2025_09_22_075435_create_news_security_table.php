<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsSecurityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_security', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('news_id');
            $table->unsignedBigInteger('security_id');
            $table->timestamps();

            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
            $table->foreign('security_id')->references('id')->on('securities')->onDelete('cascade');

            $table->unique(['news_id', 'security_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_security');
    }
}
