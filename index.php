<?php require 'config/db.php';

    $pages = scandir('pages/');
    if(isset($_GET['page']) && !empty($_GET['page'])){
       if(in_array($_GET['page'].'.php',$pages)){
         $page = $_GET['page'];
       }else{ $page = "error";}
     }else{ $page = "home";}
    $pages_functions = scandir('functions/');
    if(in_array($page.'.func.php',$pages_functions)){
       include 'functions/'.$page.'.func.php';}

      include "body/head.php";
      include "body/topbar.php"; ?>
   
      <main id="main" class="site-main">
        <?php include 'pages/'.$page.'.php';?>
      </main><!-- .site-main -->

  <?php include "body/foot.php"; ?>  
   