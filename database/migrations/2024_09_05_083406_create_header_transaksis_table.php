<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('header_transaksis', function (Blueprint $table) {
            $table->id();
            $table->integer("id_lab")->nullable();
            $table->string("header_name")->nullable();
            $table->string("dosen")->nullable();
            $table->date("tanggal_pinjam")->nullable();
            $table->time("start_time")->nullable();
            $table->time("end_time")->nullable();
            $table->string("email")->nullable();
            $table->integer("user_id")->nullable();
            $table->string("status")->nullable();
            $table->integer("is_deleted")->nullable();
            $table->integer("is_rejected")->nullable();
            $table->integer("is_resolved")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('header_transaksis');
    }
};