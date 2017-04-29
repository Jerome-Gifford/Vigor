<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username');
			$table->string('post_comment');
			$table->string('post_imgurl');
			$table->string('post_videourl');
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
		Schema::drop('user_posts');
	}

}