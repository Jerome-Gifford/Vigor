<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email');
			$table->string('password', 60);
			$table->string('first_name');
			$table->string('last_name');
			$table->integer('privilege');
			$table->decimal('current_weight')->nullable()->unsigned();
			$table->decimal('goal_weight')->nullable()->unsigned();
			$table->integer('calorie_count')->default(0);
			$table->decimal('current_bmi')->default(0);
			$table->string('profile_image')->nullable();
			$table->integer('unlocked_badges')->unsigned();
			$table->string('rank');
			$table->integer('workout_completed')->nullable()->unsigned();
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
		Schema::drop('users');
	}

}
