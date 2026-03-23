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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->foreignId('job_id')->constrained()->onDelete('cascade');
            $table->text('resume');
            $table->integer('resume_score')->nullable();
            $table->integer('locatioin_score')->nullable();
            $table->integer('final_score')->nullable();
            $table->timestamps();

            //prevent duplicate application
            $table->unique(['email', 'job_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
