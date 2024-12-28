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
        Schema::table('students', function (Blueprint $table) {
            $table->foreign(['account_id'], 'fk_students_account_id')->references(['id'])->on('accounts')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['school_id'], 'fk_students_school_id')->references(['id'])->on('schools')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('fk_students_account_id');
            $table->dropForeign('fk_students_school_id');
        });
    }
};
