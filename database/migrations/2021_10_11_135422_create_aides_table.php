<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aides', function (Blueprint $table) {
            $table->id();
            $table->string('sujet');
            $table->string('message');
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
        schema::table("aides", function(Blueprint $table)
		{
			$table->dropConstrainedForeignId("user_id");
		});
        Schema::dropIfExists('aides');
    }
}
