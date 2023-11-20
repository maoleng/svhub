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
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('slug');
            $table->string('location');
            $table->integer('type');
            $table->json('tags');
            $table->string('size');
            $table->string('country');
            $table->string('working_time');
            $table->double('salary');
            $table->longText('description');
            $table->uuid('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->dateTime('created_at');
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
