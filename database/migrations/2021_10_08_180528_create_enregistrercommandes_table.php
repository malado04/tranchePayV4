<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnregistrercommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enregistrercommandes', function (Blueprint $table) {
            $table->id(); 
            $table->string('nomproduit');
            $table->integer('prix');
            $table->integer('montantverset');
            $table->string('adresselivraison')->nullable();
            $table->string('nomclient');
            $table->integer('client_id');
            $table->dateTime('delaipaye');
            $table->integer('montantpayer');
            $table->foreignId("user_id")->constrained("users");
            $table->timestamps();   
            schema::enableForeignkeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table("enregistrercommandes", function(Blueprint $table)
		{
			$table->dropConstrainedForeignId("user_id");
		});
        Schema::dropIfExists('enregistrercommandes');
    }
}
