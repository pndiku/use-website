<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFileIdToFileUrlInNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            // Drop foreign key and file_id column
            $table->dropForeign(['file_id']);
            $table->dropColumn('file_id');

            // Add file_url column
            $table->string('file_url')->nullable()->after('article_type');
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
            // Remove file_url
            $table->dropColumn('file_url');

            // Add back file_id with foreign key
            $table->unsignedBigInteger('file_id')->nullable()->after('article_type');
            $table->foreign('file_id')->references('id')->on('files')->onDelete('set null');
        });
    }
}
