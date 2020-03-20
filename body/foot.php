	<footer id="footer" class="site-footer">
			<div class="footer-top">
				<div class="container">
					<div class="footer-up">
						<div class="row">
							<div class="col-lg-6 col-sm-6">
								<div class="footer-up-item footer-up-contact">
									<span>Contactez-nous</span>
									<ul>
										<li><i class="fa fa-mobile" aria-hidden="true"></i> +(243) 82 15 31 631</li>
										<li><i class="fa fa-envelope-o" aria-hidden="true"></i> fasi@upc.ac.cd</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-6 col-sm-6">
								<div class="footer-up-item footer-up-follow">
									<span>Suivez-nous</span>
									<ul>
										<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-spotify" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row wow fadeInUp" data-wow-delay=".1s">
						<div class="col-lg-3 col-sm-12">
							<div class="ft-item">
								<h3>apropos de la faculté</h3>
								<div class="ft-content">
									<p>La faculté des sciences informatiques vise a former les etudiants et les initier dans le monde de la technologie</p>
									<p></p>
									<ul>
										<li><i class="fa fa-map-marker" aria-hidden="true"></i><p>Lingwala, xsement triomphale-24nov</p></li>
										<li><i class="fa fa-mobile" aria-hidden="true"></i><p>Call us  +(243) 82 15 31 631</p></li>
										<li><i class="fa fa-envelope-o" aria-hidden="true"></i><p><a href="mailto:info@university.com">fasi@upc.com</a></p></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-4">
							<div class="ft-item">
								<h3>Liens importants</h3>
								<div class="ft-content">
									<ul class="menu">
										<li><a href="#">Voir nos profs</a></li>
										<li><a href="#">Nos cours</a></li>
										<li><a href="#">Qui sommes nous</a></li>
										<li><a href="#">Get In Touch</a></li>
										<li><a href="#">Cours par categories</a></li>
										<li><a href="#">Support & FAQ’s</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-4">
							<div class="ft-item">
								<h3>Visiter l'univrsité</h3>
								<div class="ft-content">
									<div class="ft-latest">
										<p>Avoir un apercu sur sur l'université</p>
										<a href="#">http://www.upcrdc.org</a>
										<span>9 HOURS AGO</span>
									</div>
									<div class="ft-latest">
										<p>Decouvrez une collection de nos livres</p>
										<a href="#">http://www.upcbibilothèque.org</a>
										<span>9 HOURS AGO</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-4">
							<div class="ft-item">
								<h3>Facebook</h3>
								<div class="ft-content">
									<ul class="instagram-list">
										<li><a href="#"><img src="images/11.jpg" alt=""></a></li>
										<li><a href="#"><img src="images/profil.png" alt=""></a></li>
										<li><a href="#"><img src="images/bg3.jpg" alt=""></a></li>
										<li><a href="#"><img src="images/bg4.jpg" alt=""></a></li>
										<li><a href="#"><img src="images/java-logo.png" alt=""></a></li>
										<li><a href="#"><img src="images/php.png" alt=""></a></li>
										<li><a href="#"><img src="images/post.png" alt=""></a></li>
										<li><a href="#"><img src="images/cloud.png" alt=""></a></li>
									</ul>
									<a href="#" class="all-insta">All Gallery</a>
								</div>
							</div>
						</div>
					</div>
					
					<div class="footer-bot">
						<div class="copyright"><p>Copyright © 2018 - Tout droit reservé</p></div>
						<div class="legal">
							<ul>
								<li><a href="#">Privacy</a></li>
								<li><a href="#">Terms</a></li>
								<li><a href="#">Sitemap</a></li>
								<li><a href="#">Puchase</a></li>
							</ul>
						</div>
						<div class="back-top"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></div>
					</div>
				</div>
			</div><!-- .footer-top -->
		</footer><!-- site-footer -->
		
		<div class="go-up">
			<a href="#"><i class="fa fa-chevron-up"></i></a>    
		</div><!-- end go-up -->
	</div><!-- #wrapper -->

	<!-- jQuery -->    
    <script src="js/jquery-1.12.4.js"></script>
    <script src="libs/popper/popper.js"></script>
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="libs/owl-carousel/owl.carousel.min.js"></script>
    <script src="libs/owl-carousel/jquery.owl-filter.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="libs/jquery.countdown/jquery.countdown.min.js"></script>
    <script src="js/main.js"></script>
    <?php
    $pages_js = scandir('assets/js/');
    if(in_array($page.'.func.js',$pages_js)){
    ?>
      <script type="text/javascript" src="assets/js/<?= $page ?>.func.js"></script>
    <?php
     }
   ?>
</body>
</html>