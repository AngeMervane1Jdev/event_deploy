<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact');
            $table->integer('account_status')->default(0)->change(); // 0=inactive,1=activé,2=supprimé
            $table->string('profil_image',2048)->nullable();
            // $table->foreignId('type_user_id')->constrained('type_users')
            // ->nullable()
            // ->onDelete('cascade'); // promtteur / organisateur
            $table->string('email')->unique();
            $table->boolean('is_admin')->default(false)->change();  
            // $table->foreignId('agence_id')->constrained('agences')
            // ->nullable()
            // ->onDelete('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
