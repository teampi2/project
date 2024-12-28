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
        Schema::create('lessons', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 100);
            $table->text('description');
            $table->dateTime('date');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->integer('account_id')->index('fk_lessons_account_idx');
            $table->integer('lesson_plan_id')->index('fk_lessons_lesson_plan_idx');
            $table->integer('class_id')->index('fk_lessons_class_idx');

            $table->unique(['lesson_plan_id'], 'lesson_plan_id_lessons_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
