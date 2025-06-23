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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // public int $id
            $table->string('title'); // public string $title
            $table->string('description'); // public string $description
            $table->text('long_description')->nullable(); // public ?string $long_description
            $table->boolean('completed'); // public bool $completed
            $table->timestamps(); // public string $created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
