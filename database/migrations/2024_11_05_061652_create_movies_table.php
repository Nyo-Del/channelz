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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('Mname');
            $table->string('Mpic');
            $table->string('Mlink');
            $table->integer('year')->nullable();
            $table->integer('createdby_id');
            $table->text('description')->nullable();
            $table->integer('Cid');
            $table->string('Mos');
            $table->unsignedBigInteger('view_count')->default(0); // New column for view count
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
