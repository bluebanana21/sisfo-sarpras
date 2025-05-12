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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('image_url');
            $table->string('assigned_num');
            $table->unsignedBigInteger('item_type_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->enum('status', ['available', 'borrowed', 'damaged']);

            $table->foreign('item_type_id')->references('id')->on('item_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
