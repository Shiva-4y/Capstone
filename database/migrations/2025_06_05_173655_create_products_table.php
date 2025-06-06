<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');               // Product name
            $table->decimal('price', 10, 2);      // Price (e.g. 999.99)
            $table->string('image')->nullable();  // Image filename or path
            $table->text('description')->nullable(); // Optional description
            $table->timestamps();                 // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};