<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pet_service', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('pet_id', 255);
			$table->integer('service_id');
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
		Schema::create('pet_service', function(Blueprint $table)
		{
			//
		});
	}

}
