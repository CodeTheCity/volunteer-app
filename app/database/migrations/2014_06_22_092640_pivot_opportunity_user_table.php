<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotOpportunityUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('opportunity_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('opportunity_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('opportunity_id')->references('id')->on('opportunities')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('opportunity_user');
	}

}
