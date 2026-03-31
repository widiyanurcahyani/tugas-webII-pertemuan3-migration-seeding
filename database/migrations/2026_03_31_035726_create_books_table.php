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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 24);
            $table->string('author', 32);
            $table->year('year_publish');
            $table->string('cover');
            $table->string('publisher');
            $table->string('city');
            $table->unsignedBigInteger('bookshelf_id');
            $table->timestamps();

            $table->foreign('bookshelf_id')
            ->references('id')
            ->on('bookshelves')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
