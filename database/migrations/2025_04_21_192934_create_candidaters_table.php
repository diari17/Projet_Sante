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
        Schema::create('candidaters', function (Blueprint $table) {
            // $table->id('idCandidater');
            $table->foreignId('idChirurgien')->constrained('chirurgiens', 'idChirurgien')->onDelete('cascade');
            $table->foreignId('idIntervention')->constrained('interventions', 'idIntervention')->onDelete('cascade');
            $table->date('date');
            $table->string('etat'); 
            $table->decimal('tarif', 10, 2);
            $table->primary(['idChirurgien', 'idIntervention']); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidaters');
    }
};
