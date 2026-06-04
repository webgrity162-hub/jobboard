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
        Schema::table('company_jobs', function (Blueprint $table) {
            $table->text('responsibilities');
            $table->text('requirements');
            $table->text('benefits');
            $table->text('apply_instructions');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_jobs', function (Blueprint $table) {
            //
        });
    }
};
