<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('log_approvals', function (Blueprint $table) {
            $table->id();
            $table->integer("id_approval")->nullable();
            $table->integer("status_log")->nullable();
            $table->string("result")->nullable();
            $table->string("note")->nullable();
            $table->string("note_resolved")->nullable();
            $table->string("created_by")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('log_approvals');
    }
};