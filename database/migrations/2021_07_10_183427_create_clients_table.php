<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->date('dob');
			$table->integer('blood_type_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->date('last_donation_date');
			$table->string('phone');
			$table->string('password');
			
			$table->string('api_token')->unique()->nullable();
			$table->string('password_reset_code')->unique()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}