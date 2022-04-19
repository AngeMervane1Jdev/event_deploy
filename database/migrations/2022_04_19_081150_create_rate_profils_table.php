<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateProfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_profils', function (Blueprint $table) {
            $table->id();
            $table->integer("rate");
            $table->foreignId("user_id")->references("id")->on('users');
            $table->foreignId("profil_id")->references("id")->on('profils');
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
        Schema::dropIfExists('rate_profils');
    }
}
