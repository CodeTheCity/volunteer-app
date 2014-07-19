<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpportunitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('opportunities', function(Blueprint $table) {
			$table->increments('id');
			$table->string('opportunity_title');
			$table->string('opportunity_status');
			$table->text('opportunity_detail');
			$table->text('opportunity_travel_information');
			$table->date('opportunity_date');
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
		Schema::drop('opportunities');
	}

}
