<?php

use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->schema->create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->string('password');
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
		$this->schema->dropIfExists('users');
	}
}
