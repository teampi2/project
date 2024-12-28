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
        Schema::table('attendances', function (Blueprint $table) {
            $table->foreign(['lesson_id'], 'fk_attendances_lesson_id')->references(['id'])->on('lessons')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['student_id'], 'fk_attendances_student_id')->references(['id'])->on('students')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropForeign('fk_attendances_lesson_id');
            $table->dropForeign('fk_attendances_student_id');
        });
    }
};
