<?php 

	function exist($matricule)

	{
		global $db;

		$t = array(
			'matricule' => $matricule
		);

		$sql = "SELECT * FROM users WHERE matricule = :matricule";
		$req = $db->prepare($sql);
		$req->execute($t);
		$exist = $req->rowCount($sql);
		return $exist;
	}

	function matricule_taken($matricule)
	{
		  global $db;

		  $e = array('matricule' => $matricule);
		  $sql = 'SELECT * FROM users WHERE matricule = :matricule';
		  $req = $db->prepare($sql);
		  $req->execute($e);
		  
		  return $req->fetchObject();
	}

 ?>