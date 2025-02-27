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
        Schema::table('activity_comments', function (Blueprint $table) {
            $table->foreign(['account_id'], 'fk_activity_comments_account_id')->references(['id'])->on('accounts')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['activity_comment_id'], 'fk_activity_comments_activity_comment_id')->references(['id'])->on('activity_comments')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['activity_id'], 'fk_activity_comments_activity_id')->references(['id'])->on('activities')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activity_comments', function (Blueprint $table) {
            $table->dropForeign('fk_activity_comments_account_id');
            $table->dropForeign('fk_activity_comments_activity_comment_id');
            $table->dropForeign('fk_activity_comments_activity_id');
        });
    }
};
