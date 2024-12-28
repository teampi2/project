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
        Schema::table('class_teachers', function (Blueprint $table) {
            $table->foreign(['account_id'], 'fk_class_teachers_account_id')->references(['id'])->on('accounts')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['class_id'], 'fk_class_teachers_class_id')->references(['id'])->on('classes')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('class_teachers', function (Blueprint $table) {
            $table->dropForeign('fk_class_teachers_account_id');
            $table->dropForeign('fk_class_teachers_class_id');
        });
    }
};