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

            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('borrowing_id')->references('id')->on('borrowings');
            $table->foreign('return_id')->references('id')->on('item_returns');

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
