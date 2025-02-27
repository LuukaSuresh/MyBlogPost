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
        Schema::create('post', function (Blueprint $table) { // Corrected table name
            $table->id();
            $table->unsignedBigInteger('user_id'); // Corrected user_id type
            $table->longText('title'); // Fixed title data type
            $table->longText('content'); // Fixed content data type
            $table->string('image')->nullable(); // Allowing null images
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
