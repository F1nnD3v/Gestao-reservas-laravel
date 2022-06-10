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
        Schema::create('tipos', function (Blueprint $table) {
            $table->id('id_tipo');
            $table->string('tipo');
        });

        DB::table('tipos')->insert(
            array(
                'id_tipo' => 1,
                'tipo' => 'Cliente'
            )
        );

        DB::table('tipos')->insert(
            array(
                'id_tipo' => 2,
                'tipo' => 'Proprietário'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos');
    }
};