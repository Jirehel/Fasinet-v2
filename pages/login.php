<?php
    if(isset($_POST['login'])) {
  
    //Si tous les champs ont ete remplis
    if(not_empty(['email', 'password'])) {
      
        extract($_POST); 
     
        $errors = [];
          // echo $email;
     if(user_exists($email,$password)){  

        $user = get_user_info($email);
            $_SESSION['id'] = $user->id;
            $_SESSION['nom'] = $user->nom;
            $_SESSION['postnom'] = $user->postnom;
            $_SESSION['prenom'] = $user->prenom;
            $_SESSION['email'] = $user->email;
            $_SESSION['avatar'] = $user->profil;
            $_SESSION['cover'] = $user->cover;
            $_SESSION['statut'] = $user->statut;
            $_SESSION['matricule'] = $user->matricule;
           header('location:index.php?page=profil1');
        } else {
            $errors[] = 'Vos identifiants ne correspondent pas';
            //save_input_data();
        }
    }
} else {
    //clear_input_data(); S'il vient d'arriver fraichement sur la page, il n'y a aucune raison que les
    //champs soient pre-remplis.
}

?>



	<div class="page-contact">
		<div class="site-main">
			
		<div class="site-top" style="background-image: url('images/Letter.jpg');">
				<div class="container">
					<div class="site-top-text">
						<h2>Connectez-vous et restez a la page</h2>
						<div class="breadcrumbs">
							<ul>
								<li><a href="#">Amis</a><i class="fa fa-angle-right" aria-hidden="true"></i></li>
								<li><a href="#">Chat</a><i class="fa fa-angle-right" aria-hidden="true"></i></li>
								<li>Forum</li>
							</ul>
						</div><!-- .breadcrumbs -->
					</div>
				</div>
			</div>
			<?php /*  ?>
			<div class="best-course">
				<div class="container">
					<div class="courses-search subscribe">
						<p>Subscribe University to learn new creative skill</p>
						<div class="contact-btn">
							<a href="#" class="btn btn-noborder">Learn More</a>
						</div>
					</div><!-- .courses-search -->
				</div>
			</div><!-- .best-course -->
			<?php  */ ?>
		</div>
	</div>

			<div class="contact-content" style="background-color:teal;">
				<div class="container">
					<div class="row">

						<div class="col-lg-6">
							<div class="contact-item">
								<h2 class="text-white">Se Connecter</h2>
								<form method="post">
									
									<div class="field">
										<input type="text" placeholder="Email" autocomplete="off" name="email">
										<i class="fa fa-envelope-o" aria-hidden="true"></i>
									</div>
									<div class="field">
										<input type="password" placeholder="Mot de Passe" autocomplete="off" name="password">
										<i class="fa fa-key" aria-hidden="true"></i>
									</div>
									
									<input type="submit" name="login" id="login">
								</form>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="contact-item identifiant" style="visibility:hidden;">
								<br>
								<h2>Récuperer son compte</h2>
								<form>
									<div class="field">
										<input type="text" placeholder="Entrez votre identifiant" autocomplete="off">
										<i class="fa fa-user" aria-hidden="true"></i>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div><!-- .contact-content -->
			
			
	<!-- .site-main -->