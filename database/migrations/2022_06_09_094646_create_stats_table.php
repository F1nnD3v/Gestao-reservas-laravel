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
        Schema::create('stats', function (Blueprint $table) {
            $table->id('id_status');
            $table->string('status');
            $table->timestamps();
        });

        DB::table('stats')->insert(
            array(
                'id_status' => 1,
                'status' => 'Pendente'
            )
        );

        DB::table('stats')->insert(
            array(
                'id_status' => 2,
                'status' => 'Confirmado'
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
        Schema::dropIfExists('stats');
    }
};
