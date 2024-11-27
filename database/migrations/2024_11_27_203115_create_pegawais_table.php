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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedInteger('nik');
            $table->unsignedInteger('nip')->nullable();
            $table->unsignedInteger('nuptk')->nullable();
            $table->foreignId('jabatan_id')->constrained('jabatans')->cascadeOnUpdate();
            $table->string('foto')->nullable();
            $table->text('alamat')->nullable();
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->string('status')->enum('PNS', 'PPNPN', 'Honorer');
            $table->boolean('isAktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
