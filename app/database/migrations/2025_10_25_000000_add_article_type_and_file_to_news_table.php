<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArticleTypeAndFileToNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->enum('article_type', ['article', 'report'])->default('article')->after('is_published');
            $table->unsignedBigInteger('file_id')->nullable()->after('article_type');

            // Add foreign key constraint
            $table->foreign('file_id')->references('id')->on('files')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign(['file_id']);
            $table->dropColumn(['article_type', 'file_id']);
        });
    }
}
