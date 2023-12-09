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
        Schema::create('diagnoses_assignment', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->unsignedBigInteger('diagnosis_id');
            $table->foreign('diagnosis_id')->references('id')->on('diagnoses');

            $table->string('observation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnoses_assignment');
    }
};
