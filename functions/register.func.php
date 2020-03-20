<?php 

	function email_taken($email)
	{
		  global $db;

		  $e = array('email' => $email);
		  $sql = 'SELECT * FROM users WHERE email = :email';
		  $req = $db->prepare($sql);
		  $req->execute($e);
		  $free = $req->rowCount($sql);

		  return $free;
	}

	function register($email, $password, $matricule)
	{
		global $db;
		$r = array(
			'email'=>$email,
			'matricule'=>$matricule,
			'password' => $password
		);

		$sql = "UPDATE users SET email =:email,  password=:password  WHERE matricule = :matricule";
		$req = $db->prepare($sql);
		$req->execute($r);
		/*$add = $req->rowCount($sql);
		return $add;*/
	}
	
 ?>