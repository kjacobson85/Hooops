<?php

class AuthModel {

	public $db;
	
	public function __construct($dsn, $user, $pass) {
		$this->db = new PDO($dsn, $user, $pass);
		$this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		
	}
	
	public function getUserByNamePass($name, $pass){
		$stmt = $this->db->prepare("
		
		SELECT user_id AS id, user_name AS username, user_firstname as first
		FROM Login
		WHERE (user_name = :user)
			AND (user_password = password)))
		
		
		");
		if ($stmt->execute(array(':username'=> $name, ':password' => $pass))){
			$rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			if (count($rows) === 1){
				return $rows[0];
			}
			
		}
		return FALSE;
		
		
	}
}