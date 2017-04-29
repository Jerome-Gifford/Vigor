<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDayInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_day_infos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('hours_of_workouts');
			$table->integer('cals_ingested');
			$table->integer('cals_burned');
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
		Schema::drop('user_day_infos');
	}

}
