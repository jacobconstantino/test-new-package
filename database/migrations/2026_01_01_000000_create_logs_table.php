<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection(config('logger.connection'))
            ->create(config('logger.table_name', 'logs'), function (Blueprint $table) {
                $table->id();
                $table->string('event')->nullable();
                $table->text('description');
                $table->nullableMorphs('subject');
                $table->nullableMorphs('causer');
                $table->json('properties')->nullable();
                $table->timestamps();
            });
    }

    public function down(): void
    {
        Schema::connection(config('logger.connection'))
            ->dropIfExists(config('logger.table_name', 'logs'));
    }
};
