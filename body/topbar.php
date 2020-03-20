<header id="header" class="site-header">
	

			<div class="container">
				<div class="site-brand">
					<h1 ><a href="index.php?page=home" style="color: white; font-size: 60px; font-family: 'chiller';"><span style="color: red">F</span>asinet</a></h1>
				</div><!-- .site-brand -->
				
				<div class="menu-mobile">
					<button class="c-hamburger c-hamburger--htx"><span></span></button>
				</div><!-- .menu-mobile -->
				<div class="menu-bg"></div>
				
				<nav class="main-menu">	
					<ul>
					 <?php
    				     if(isLogged() == 0){
       			     ?>
             
						<li class="has-child">
							<a href="index.php?page=home"><i class="fa fa-home fa-lg"></i>  Accueil</a>
							
						</li>
						<li class="has-child">
							<a href="event-grid.html"><i class="fa fa-info-circle fa-lg"></i>  Valve </a>
							
						</li>
						<li class="has-child">
							<a href="index.php?page=matricule"><i class="fa fa-pencil fa-lg"></i> S'inscrire</a>
							
						</li>
						<li class="has-child">
							<a href="index.php?page=login"><i class="fa fa-plug fa-lg"></i>  Connexion</a>
							
						</li>


				 <?php
           			}else{
            	  ?>

						<li class="has-child">
							<a href="#">Pages <span class="arrow"><i class="fa fa-angle-down"></i></span></a>
							<div class="dropdown-menu">
								<ul>
									<li><a href="about-us.html">About Us</a></li>
									<li><a href="faculity-profile.html">Faculity Profile</a></li>
									<li><a href="faq.html">FAQ</a></li>
									<li><a href="membership.html">Membership</a></li>
									<li><a href="404.html">404 Page</a></li>
								</ul>
							</div>
						</li>
					
						<li><a href="contact-us.html">Contact</a></li>
						<li class="has-child">
							<a href="course-grid.html">Courses <span class="arrow"><i class="fa fa-angle-down"></i></span></a>
							<div class="dropdown-menu multi-column">
								<div class="row">
									<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
										<div class="title2"><h2>Course Layouts</h2></div>
										<ul>
											<li><a href="course-grid.html">Courses Grid</a></li>
											<li><a href="course-list.html">Courses List</a></li>
											<li><a href="course-detail.html">Course Detail Fullwidth</a></li>
											<li><a href="course-detail-sidebar.html">Course Detail Sidebar</a></li>
											<li><a href="course-grid.html">Courses Grid</a></li>
											<li><a href="course-list.html">Courses List</a></li>
											<li><a href="course-detail.html">Course Detail Fullwidth</a></li>
											<li><a href="course-detail-sidebar.html">Course Detail Sidebar</a></li>
											<li><a href="course-grid.html">Courses Grid</a></li>
										</ul>
									</div>
									<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
										<div class="title2"><h2>The new top courses</h2></div>
										<div class="menu-course-slider owl-carousel">
											<div class="menu-course-item">
												<a href="course-detail-sidebar.html"><img src="images/menu-course-img.jpg" alt=""></a>
												<div class="menu-course-box">
													<h3><a href="course-detail-sidebar.html">Building a Slack Bot</a></h3>
													<a href="course-detail-sidebar.html" class="price price-free">Free</a>
												</div>
											</div>
											<div class="menu-course-item">
												<a href="course-detail-sidebar.html"><img src="images/menu-course-img.jpg" alt=""></a>
												<div class="menu-course-box">
													<h3><a href="course-detail-sidebar.html">Building a Slack Bot</a></h3>
													<a href="course-detail-sidebar.html" class="price">$69</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
										<div class="widget widget-curriculum">
											<div class="curriculum-info">
												<h2>Course</h2>
												<p>New Curriculum 2018</p>
											</div>
											<a href="course-detail-sidebar.html" class="details">Details<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
							</div>
						</li>
				 <?php
          			 }
                 ?>
					</ul>
				</nav><!-- .main-menu -->
				




				<div class="search-main">
					<div class="search-icon"><i class="nc-icon-outline ui-1_zoom"></i></div>
					<div class="search-bg"></div>
					<div class="search-popup">
						<form action="#">
							<input type="text" placeholder="Rechercher sur Fasinet">
							<button><i class="nc-icon-outline ui-1_zoom"></i></button>
						</form>
					</div>
				</div><!-- .search-main -->
			</div><!-- .container -->
		</header><!-- .site-header -->