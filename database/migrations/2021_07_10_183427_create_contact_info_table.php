<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactInfoTable extends Migration {

	public function up()
	{
		Schema::create('contact_info', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('phone');
			$table->string('email');
			$table->string('insta_link');
			$table->string('facebook_link');
			$table->string('twitter_link');
			$table->string('youtube_link');
		});
	}

	public function down()
	{
		Schema::drop('contact_info');
	}
}