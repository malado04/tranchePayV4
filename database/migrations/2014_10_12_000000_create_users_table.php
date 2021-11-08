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
            $table->string('prenom');
            $table->string('nom');
            $table->string('boutique')->nullable();
            $table->string('site')->nullable();
            $table->string('email')->nullable();
            $table->string('type')->nullable();
            $table->string('image')->nullable();
            $table->string('commentaire')->nullable();
            $table->string('categorie')->nullable();
            $table->boolean('valide')->default(0);
            $table->string('telephone')->unique();
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
