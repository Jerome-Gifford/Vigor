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
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->integer('privilege');
			$table->integer('measurement_pref')->unsigned();
			$table->decimal('current_weight')->nullable()->unsigned();
			$table->decimal('goal_weight')->nullable()->unsigned();
			$table->integer('calorie_count')->default(0)->nullable();
			$table->integer('user_age')->unsigned()->nullable();
			$table->integer('user_height')->unsigned()->nullable();
			$table->integer('user_fat_percentage')->nullable();
			$table->string('profile_image');
			$table->integer('unlocked_badges')->unsigned()->nullable();
			$table->string('rank')->nullable();
			$table->integer('phone_number')->nullable();
			$table->integer('phone_carrier')->nullable();
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
