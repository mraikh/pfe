<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->float("resultat")->nullable()->default(0.0); // resultat est calculé et stocké sous form d'un nombre (15/20 = 0,75 | 38/40 = 0,95 ...)
            $table->foreignId('apprenant_id')->constrained('apprenants');
            $table->foreignId('chapitre_id')->constrained('chapitres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
};
