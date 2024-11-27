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
        Schema::disableForeignKeyConstraints();

        Schema::create('instansis', function (Blueprint $table) {
            $table->id();
            $table->string('institusi')->nullable();
            $table->string('subinstitusi')->nullable();
            $table->string('instansi');
            $table->enum('status', ['Negeri', 'Swasta'])->nullable();
            $table->enum('akreditasi', ['A', 'B', 'C', 'D'])->nullable();
            $table->text('alamat')->nullable();
            $table->string('kepala_instansi');
            $table->string('nip_kepala');
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->string('logo_institusi')->nullable();
            $table->string('logo_instansi')->nullable();
            $table->string('tte')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instansis');
    }
};
