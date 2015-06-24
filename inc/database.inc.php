<?php

class Database extends PDO{

	public $dbserver = '';
	public $username = '';
	public $password = '';
	public $database = '';

	public function __construct(){
		$this->dbserver = 'localhost';
		$this->username = 'root';
		$this->database = 'carrental';
		$this->password = 'root';

		parent::__construct("mysql:host=".$this->dbserver.";dbname=".$this->database, $this->username, $this->password);
		$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
}
$db  = new Database;
?>