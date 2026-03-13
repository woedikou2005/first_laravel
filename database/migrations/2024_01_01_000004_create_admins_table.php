<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Admin hérite de Utilisateur : on utilise une FK vers utilisateurs
        Schema::create('admins', function (Blueprint $table) {
            $table->id('idAdmin');
            $table->foreignId('idUtilisateur')
                  ->constrained('utilisateurs', 'idUtilisateur')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('admins'); }
};
