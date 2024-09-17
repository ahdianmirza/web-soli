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
        Schema::create('approval_peminjamen', function (Blueprint $table) {
            $table->id();
            $table->integer("id_header")->nullable();
            $table->integer("id_departemen")->nullable();
            $table->integer("status_approval")->nullable();
            $table->string("result")->nullable();
            $table->string("note")->nullable();
            $table->string("note_resolved")->nullable();
            $table->integer("is_resolved")->nullable();
            $table->string("created_by")->nullable();        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approval_peminjamen');
    }
};