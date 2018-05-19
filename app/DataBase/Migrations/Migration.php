<?php


namespace App\DataBase\Migrations;


use Illuminate\Database\Capsule\Manager;
use Phinx\Migration\AbstractMigration;

class Migration extends AbstractMigration
{
	protected $schema;

	public function init()
	{
		$this->schema = (new Manager)->schema();
	}
}