<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVersementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versements', function (Blueprint $table) {
            $table->id();
            $table->integer('verset');
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("enregistrercommande_id")->constrained("enregistrercommandes");
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
        schema::table("versements", function(Blueprint $table)
		{
			$table->dropConstrainedForeignId("user_id");
			$table->dropConstrainedForeignId("enregistrercommande_id");
		});
        Schema::dropIfExists('versements');
    }
}
