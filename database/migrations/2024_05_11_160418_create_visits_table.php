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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->enum('sample_status',['collected','Not collected'])->default('Not collected');
            $table->enum('status',['started','in lab','done'])->default('started');
            $table->text('purpose')->nullable();
            $table->foreignId('patient_id')->nullable()->constrained('patients')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
