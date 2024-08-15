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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            // Create an unsigned big integer column for user ID
            $table->unsignedBigInteger('user_id');

            // Create an unsigned big integer column for product ID
            $table->unsignedBigInteger('product_id');

            // Set up foreign key constraint for user_id, referencing the id column in the users table
            // On deletion of a user, related cart entries will also be deleted (cascade delete)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Set up foreign key constraint for product_id, referencing the id column in the products table
            // On deletion of a product, related cart entries will also be deleted (cascade delete)
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
