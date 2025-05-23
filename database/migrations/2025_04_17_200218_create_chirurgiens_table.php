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
        Schema::create('chirurgiens', function (Blueprint $table) {
            $table->id('idChirurgien');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email') ->unique() ;
            $table->string('region');
            $table->string('telephone');
            $table->string('exp');
            $table->string('password');
            $table->string('specialite');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chirurgiens');
    }
};
