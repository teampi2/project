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
        Schema::table('student_activities', function (Blueprint $table) {
            $table->foreign(['activity_id'], 'fk_student_activities_activity_id')->references(['id'])->on('activities')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['student_id'], 'fk_student_activities_student_id')->references(['id'])->on('students')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_activities', function (Blueprint $table) {
            $table->dropForeign('fk_student_activities_activity_id');
            $table->dropForeign('fk_student_activities_student_id');
        });
    }
};
