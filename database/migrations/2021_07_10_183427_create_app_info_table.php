<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppInfoTable extends Migration {

	public function up()
	{
		Schema::create('app_info', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('body');
		});
	}

	public function down()
	{
		Schema::drop('app_info');
	}
}