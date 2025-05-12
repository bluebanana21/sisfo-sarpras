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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('borrowing_id');
            $table->unsignedBigInteger('return_id');

            $table->foreign('item_id')->references('id')->on('items')->cascadeOnDelete();
            $table->foreign('borrowing_id')->references('id')->on('borrowings')->cascadeOnDelete();
            $table->foreign('return_id')->references('id')->on('item_returns')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
