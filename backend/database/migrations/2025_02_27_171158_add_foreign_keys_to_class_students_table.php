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
        Schema::table('class_students', function (Blueprint $table) {
            $table->foreign(['class_id'], 'fk_class_student_class_id')->references(['id'])->on('classes')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['student_id'], 'fk_class_student_student_id')->references(['id'])->on('students')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('class_students', function (Blueprint $table) {
            $table->dropForeign('fk_class_student_class_id');
            $table->dropForeign('fk_class_student_student_id');
        });
    }
};
