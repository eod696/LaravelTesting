<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('content_pages', function($tbl)
		{
			$tbl->increments('id');
			$tbl->string('slug');
			$tbl->string('title');
			$tbl->longText('body');
			$tbl->timestamps();
			// TODO: 
			// 	1. Attach optional comments w/ one-to-many
			//	2. Attach a mandatory user w/ many-to-one
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('content_pages');
	}

}
