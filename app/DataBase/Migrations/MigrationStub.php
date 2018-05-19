<?php

use $useClassName;
use Illuminate\Database\Schema\Blueprint;

class $className extends $baseClassName
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    //Create new table
		$this->schema->create('', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
		});

        //Update table
		$this->schema->table('', function (Blueprint $table) {
			$table->increments('id');
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
		$this->schema->dropIfExists('');
	}
}
