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
        Schema::create('item_returns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borrowing_id');
            $table->enum('return_status', ['returned', 'late', 'lost', 'damaged', 'unconfirmed']);
            $table->string('fine')->nullable();

            $table->foreign('borrowing_id')->references('id')->on('borrowings')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_returns');
    }
};
