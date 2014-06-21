<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotOpportunitySkillTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('opportunity_skill', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('opportunity_id')->unsigned()->index();
			$table->integer('skill_id')->unsigned()->index();
			$table->foreign('opportunity_id')->references('id')->on('opportunities')->onDelete('cascade');
			$table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('opportunity_skill');
	}

}
