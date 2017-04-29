<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPostsTable extends Migration {

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
			$table->integer('user_id');
			$table->string('post_body');
			$table->string('post_img_url');
			$table->string('post_video_url');
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
