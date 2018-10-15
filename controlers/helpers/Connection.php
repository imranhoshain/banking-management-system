<?php
namespace App\helpers;
use PDO;
use PDOException;
/**
* Database connection class
*/
class Connection{
	protected $con;	
	private $user = 'mutualfriends_bank';
	private $password = '(vg}jueX1cBi';
	public function __construct(){
		try{
			$this->con = new PDO('mysql:host=localhost;dbname=mutualfriends_bank',$this->user,$this->password);
		}
		catch (PDOException $e){
			print "ERROR!: " . $e->getMessage() . "<br \>";
			die();
		}
	}
}
?>