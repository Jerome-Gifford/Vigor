<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('from_user_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned();

			$table->string('subject', 128)->nullable();
			$table->string('type', 128);
			$table->text('body')->nullable();

			$table->boolean('is_read')->default(0);
			$table->dateTime('sent_at')->nullable();
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
		Schema::drop('notifications');
	}

}
