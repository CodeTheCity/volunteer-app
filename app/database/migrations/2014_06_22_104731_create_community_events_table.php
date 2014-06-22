<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommunityEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('community_events', function(Blueprint $table) {
			$table->increments('id');
			$table->string('community_event_title');
			$table->text('community_event_detail');
			$table->date('community_event_date');
			$table->integer('location_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->foreign('location_id')->references('id')->on('locations');
			$table->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('community_events');
	}

}
