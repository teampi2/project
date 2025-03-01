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
        Schema::table('lesson_comments', function (Blueprint $table) {
            $table->foreign(['account_id'], 'fk_lesson_comments_account_id')->references(['id'])->on('accounts')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['lesson_comment_id'], 'fk_lesson_comments_lesson_comment_id')->references(['id'])->on('lesson_comments')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['lesson_id'], 'fk_lesson_comments_lesson_id')->references(['id'])->on('lessons')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lesson_comments', function (Blueprint $table) {
            $table->dropForeign('fk_lesson_comments_account_id');
            $table->dropForeign('fk_lesson_comments_lesson_comment_id');
            $table->dropForeign('fk_lesson_comments_lesson_id');
        });
    }
};
