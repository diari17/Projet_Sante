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
        Schema::create('interventions', function (Blueprint $table) {
            $table->id('idIntervention');
            $table->date('date');
            $table->string('SpeRequise');
            $table->string('hopital');
            $table->foreignId('idPatient')->constrained('patients', 'idPatient')->onDelete('cascade');
            $table->string('type');
            $table->time('heure');
            $table->integer('duree'); 
            $table->string('niveau'); 
            $table->decimal('renumeration', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interventions');
    }
};
