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
    {Schema::create('laravelforms', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->date('birthday');
        $table->string('gender');
        $table->string('state');
        $table->string('city');
        $table->json('education')->nullable();
        $table->string('profile_photo')->nullable();
        $table->json('skills')->nullable();
        $table->json('certificates')->nullable();
        $table->string('profession');
        $table->string('company_name')->nullable();
        $table->date('job_started')->nullable();
        $table->string('business_name')->nullable();
        $table->string('location')->nullable();
        $table->string('email');
        $table->string('mobile');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laravelforms');
    }
};
