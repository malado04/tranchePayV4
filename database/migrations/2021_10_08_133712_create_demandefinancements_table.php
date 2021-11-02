<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandefinancementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandefinancements', function (Blueprint $table) {
            $table->id();
            $table->string('nomboutique');
            $table->string('nomproduit');
            $table->string('lienproduit')->nullable();
            $table->string('adresseboutique')->nullable();
            $table->string('adresselivraison')->nullable();
            $table->integer('prix'); 
            $table->integer('montantverset');
            $table->string('nombremois');
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
        schema::table("demandefinancements", function(Blueprint $table)
		{
			$table->dropConstrainedForeignId("user_id");
		});
        Schema::dropIfExists('demandefinancements');
    }
}
