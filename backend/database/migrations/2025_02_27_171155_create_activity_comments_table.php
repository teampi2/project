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
        Schema::create('activity_comments', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('content');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->integer('account_id')->index('fk_activity_comments_account_idx');
            $table->integer('activity_id')->index('fk_activity_comments_activity_idx');
            $table->integer('activity_comment_id')->nullable()->index('fk_activity_comments_activity_comment_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_comments');
    }
};
