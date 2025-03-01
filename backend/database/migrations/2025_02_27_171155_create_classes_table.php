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
        Schema::create('classes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 100);
            $table->enum('shift', ['MORNING', 'AFTERNOON', 'EVENING', 'NIGHT']);
            $table->string('academic_year', 6);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->integer('account_id')->index('fk_classes_account_idx');
            $table->integer('school_id')->index('fk_classes_school_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
