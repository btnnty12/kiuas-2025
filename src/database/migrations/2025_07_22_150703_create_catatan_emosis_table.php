<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('catatan_emosis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('remajaanak_id')->constrained('remajaanak')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('emosi'); // Contoh: senang, sedih, marah, cemas
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catatan_emosis');
    }
};