<?php  
if (isLogged()==1) {
	header("Location:index.php?page=profil1");
}
	global $errors;
	if (isset($_POST['submit'])) 
	{
		//include 'dropdown.php';
		$matricule = htmlspecialchars(trim($_POST['matricule']));
		if (empty($matricule))
		{
			$errors = "Tous les champs n'ont pas été remplis";
		}
		else
		{
			

			if (exist($matricule)==1) 
			{	
				$exist_matricule = matricule_taken($matricule);
				$email_exist = $exist_matricule->email;
				$pass_exist = $exist_matricule->password;
				/*echo $email_exist.'</br>';
				echo $pass_exist;*/
				

				if ( $email_exist=="" && $pass_exist=="")
				{
					$_SESSION['matricule'] = $matricule;
					
				    header("Location:index.php?page=register");	
				}
				else
				{
					$errors = "le matricule est déjà utilisé";
				}
			}
			else
			{
				$errors = "Votre matricule n'est pas correct!";
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
								<label for="yn">Matricule</label>
								<input name="matricule" type="text" id="yn" placeholder="Entrer votre matricule" >
								<i class="fa fa-user-circle" aria-hidden="true"></i>
								
							</div>
							<p style="color: red; text-align: center;"><?php echo $errors ?></p>
							<br> 
							<div class="field">
								<input type="submit" name="submit" value="Suivant">
							</div>
							<!--le modal-->
							<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
							  <div class="modal-dialog modal-sm" role="document">
							    <div class="modal-content">
							      ...
							    </div>
							  </div>
							</div>
							<!---->
						</form>
					</div>
					</div>
				</div>
			</div>