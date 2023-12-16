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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
             $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('job_title');
            $table->string('job_type');
            $table->text('job_description');
            $table->string('min_salary');
            $table->string('max_salary');
            $table->string('job_location');
            $table->string('deadline');
            $table->text('responsibility');
            $table->text('benefits');
            $table->integer('job_status');
            $table->timestamps();
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
