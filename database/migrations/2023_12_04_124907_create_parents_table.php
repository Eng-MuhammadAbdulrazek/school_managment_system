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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();

            // Credentials Info

            $table->string('email');
            $table->string('password');

            // Father Info

            $table->string('father_Name');
            $table->string('father_National_ID');
            $table->string('father_Phone');
            $table->string('father_Job');

            $table->bigInteger('father_Nationality_ID')->unsigned();
            $table->foreign('father_Nationality_ID')
            ->references('id')
            ->on('nationalities')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->bigInteger('father_Blood_ID')->unsigned();
            $table->foreign('father_Blood_ID')
            ->references('id')
            ->on('blood_types')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->bigInteger('father_Relegion_ID')->unsigned();
            $table->foreign('father_Relegion_ID')
            ->references('id')
            ->on('relegions')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->string('father_Address');

            // Mother Info

            $table->string('mother_Name');
            $table->string('mother_National_ID');
            $table->string('mother_Phone');
            $table->string('mother_Job');

            $table->bigInteger('mother_Nationality_ID')->unsigned();
            $table->foreign('mother_Nationality_ID')
            ->references('id')
            ->on('nationalities')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->bigInteger('mother_Blood_ID')->unsigned();
            $table->foreign('mother_Blood_ID')
            ->references('id')
            ->on('blood_types')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->bigInteger('mother_Relegion_ID')->unsigned();
            $table->foreign('mother_Relegion_ID')
            ->references('id')
            ->on('relegions')
            ->onUpdate('cascade')
            ->onDelete('restrict');
            $table->string('mother_Address');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
