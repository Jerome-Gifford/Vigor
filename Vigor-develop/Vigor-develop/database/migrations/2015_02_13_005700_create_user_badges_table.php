<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBadgesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_badges', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('badge_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->timestamps();
		});

		Schema::table('user_badges', function(Blueprint $table)
		{
			$table->foreign('badge_id')->references('id')->on('badges');
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_badges');
		
	}

}
