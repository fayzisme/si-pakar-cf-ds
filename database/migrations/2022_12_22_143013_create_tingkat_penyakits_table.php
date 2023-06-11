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
        Schema::create('tingkat_penyakit', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penyakit');
            $table->string('penyakit');
            $table->timestamps();
        });

        Schema::table('tingkat_penyakit', function (Blueprint $table) {
            $table->unique('kode_penyakit');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   

        Schema::table('artikels', function (Blueprint $table) {
            $table->dropForeign(['kode_penyakit']);
            $table->dropColumn('kode_penyakit');
        });

        Schema::dropIfExists('tingkat_penyakits');
    }
};
