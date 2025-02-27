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
        Schema::create('students', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 100);
            $table->string('email', 256)->unique('email_students_unique');
            $table->string('enrollment', 25)->unique('enrollment_students_unique');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->integer('account_id')->nullable()->unique('account_id_students_unique');
            $table->integer('school_id')->index('fk_students_school_idx');

            $table->index(['account_id'], 'fk_students_account_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
