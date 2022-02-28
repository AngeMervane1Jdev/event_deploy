<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->foreignId('agence_id')->constrained('agences')
             ->nullable()
             ->default(null)
            ->onDelete('no action');
            
             $table->foreignId('type_user_id')->constrained('type_users')
             ->nullable()
             ->default(null)
             ->onDelete('no action'); // promtteur / organisateur
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
