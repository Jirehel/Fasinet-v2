<?php 
	if (isLogged()==1) {
		header("Location:index.php?page=profil1");
		exit();
	}
	if(!isset($_SESSION['matricule'])){
		header("Location:index.php?page=matricule");
		echo "les modif ne ";
	}
	// $_SESSION['matricule'];
	//var_dump($matricule);
	//die();
	if (isset($_POST['submit'])) 
	{
		

	    $email = htmlspecialchars(trim($_POST['email']));
	    $password = sha1(htmlspecialchars(trim($_POST['password'])));
	    $password1 = sha1(htmlspecialchars(trim($_POST['password1'])));

	    if (empty($email) || empty($password) || empty($password1))

          {
             $errors ['empty'] = "Tous les champs n'ont pas été remplis";
          }
          else
          {
          	if (email_taken($email)==1) 
          	{
          		$errors [] = "L'adresse email est déjà utilisée";
          	}
          	else
          	{
          		if ($password==$password1) 
          		{
          			register($email, $password, $matricule);
          			header("Location:index.php?page=login");
          		}
          		else
          		{
          			$errors [] = "Les mots de passe ne correspondent pas";
          		}
          	}
          }
	}

 ?>
</div>
		<div class="register-course wow fadeInUp" data-wow-delay=".1s">
			<div class="rc-left">
					<div class="rc-item">
						<img src="images/assets/explore-cat.png" alt="">
						<p>fasinet <span>Enregistrez-vous maintenant!!</span></p>
						<h2>Nombre d'inscrit</h2>
						<div class="rc-time">
							<p>04 <span>Days</span></p><span class="dot">:</span>
							<p>15 <span>Hours</span></p><span class="dot">:</span>
							<p>712 <span>Mins</span></p><span class="dot">:</span>
							<p>59 <span>Secs</span></p>
						</div>
					</div>
			</div>
				
				<div class="rc-right">
					<div class="rc-item">
				<div class="container">
						<form method="post">

							<div class="field">
								<label for="yn">E-mail</label>
								<input type="email" name="email" id="yn" placeholder="Entrer votre adresse email" required="required"> 
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
							</div>
							<div class="field">
								<label for="phone">Mot de passe</label>
								<input type="password" id="phone" name="password" placeholder="Entrer votre mot de passe">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</div>
							<div class="field">
								<label for="phone">Confirmer votre mot de passe</label>
								<input type="password" id="phone" name="password1" placeholder="Saisir votre mot de passe à nouveau">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</div>
							<div class="field">
								<input type="submit" name="submit" value="S'inscrire" data-toggle="modal" data-target="#myModal">
							</div>
						</form>
					</div>
					</div>
				</div>
			</div>