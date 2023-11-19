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
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('category');
            $table->integer('tag');
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
