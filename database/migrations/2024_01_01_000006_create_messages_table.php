<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('messages', function (Blueprint $table) {
            $table->id('idMessage');
            $table->foreignId('idUtilisateur')
                  ->constrained('utilisateurs', 'idUtilisateur')
                  ->onDelete('cascade');
            $table->foreignId('idAdmin')
                  ->constrained('admins', 'idAdmin')
                  ->onDelete('cascade');
            $table->text('contenu');
            $table->timestamp('dateEnvoi')->useCurrent();
            $table->string('statut')->default('envoye');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('messages'); }
};
