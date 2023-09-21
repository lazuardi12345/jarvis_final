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
        Schema::create('penggajians', function (Blueprint $table) {
            $table->id();
            $table->string('potongan');
            $table->unsignedBigInteger('id_employees');
            $table->unsignedBigInteger('id_tunjangans');
            $table->unsignedBigInteger('id_divisis');
            $table->string('gaji_pokok');
            $table->timestamps();

            $table->foreign('id_employees')->references('id')->on('employees')->onDelete('cascade');

            $table->foreign('id_tunjangans')->references('id')->on('tunjangans')->onDelete('cascade');

            $table->foreign('id_divisis')->references('id')->on('divisis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggajians');
    }
};