<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('documents', function (Blueprint $table) {
            $table->id('idDocument');
            $table->foreignId('idUtilisateur')
                  ->constrained('utilisateurs', 'idUtilisateur')
                  ->onDelete('cascade');
            $table->foreignId('idMatiere')
                  ->constrained('matieres', 'idMatiere')
                  ->onDelete('restrict');
            $table->foreignId('idNiveau')
                  ->constrained('niveaux', 'idNiveau')
                  ->onDelete('restrict');
            $table->string('titre');
            $table->text('description')->nullable();
            $table->string('fichier');
            $table->timestamp('dateUpload')->useCurrent();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('documents'); }
};
