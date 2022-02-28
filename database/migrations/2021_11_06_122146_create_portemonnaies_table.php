<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortemonnaiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portemonnaies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_client')->constrained('users')->cascadeOnDelete();
            $table->double('total_buy_price');
            $table->double('waiting_price');
            $table->double('total_account');
            $table->string('username');

            $table->string('card_number');
            $table->string('cvv');
            $table->integer('type')->default(1);
            $table->string('description')->default("Paiement par carte de crédit");
            $table->string('expiration');
            $table->string('id_tickets')->default()->null();
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
        Schema::dropIfExists('portemonnaies');
    }
}
