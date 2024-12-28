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
        Schema::table('announcements', function (Blueprint $table) {
            $table->foreign(['account_id'], 'fk_announcements_account_id')->references(['id'])->on('accounts')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['announcement_id'], 'fk_announcements_announcement_id')->references(['id'])->on('announcements')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['class_id'], 'fk_announcements_class_id')->references(['id'])->on('classes')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->dropForeign('fk_announcements_account_id');
            $table->dropForeign('fk_announcements_announcement_id');
            $table->dropForeign('fk_announcements_class_id');
        });
    }
};
