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
        Schema::create('company_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('location');
            $table->string('currency')->default('USD');
            $table->enum('type',['full-time', 'part-time', 'remote', 'contract', 'internship']);
            $table->enum('experience',['entry','mid','senior','lead']);
            $table->decimal('salary_min',10,2)->nullable();
            $table->decimal('salary_max',10,2)->nullable();
            $table->enum('status',['draft','active','closed'])->default('active');
        
            $table->softDeletes();
            $table->timestamps();

            $table->index(['status', 'type']);
            $table->index(['company_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
