	<?php
			  session_start();

			  require 'database.php';

			  if (isset($_SESSION['user_id'])) {
			    $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE id = :id');
			    $records->bindParam(':id', $_SESSION['user_id']);
			    $records->execute();
			    $results = $records->fetch(PDO::FETCH_ASSOC);

			    $user = null;

			    if (count($results) > 0) {
			      $user = $results;
			    }
			  }
			?>
	<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.3.5, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.3.5, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/carrito-compras-desarrollo-tienda-virtual-121x61.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Proyecto161</title>
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
  
</head>
<body>

  <section class="menu cid-s48OLK6784" once="menu" id="menu1-h">
    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    
                        <img src="assets/images/carrito-compras-desarrollo-tienda-virtual-121x61.png" alt="" style="height: 3.8rem;">
                    
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-7" href="index.html">SuperMercado</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">

                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="login.php">Iniciar Sesion</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="productos.php" aria-expanded="true">Productos</a>
                    </li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="#" aria-expanded="true">Compras</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="#top">Volver al inicio</a></li></ul>
                
                
            </div>
        </div>
    </nav>

</section>

<section class="header1 cid-s48MCQYojq mbr-fullscreen mbr-parallax-background" id="header1-f">

    

    

    <div class="align-center container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-1"><strong>SUPERMERCADO LAS BICHOTAS</strong></h1>
                
                
                
            </div>
        </div>
    </div>
</section>

<section class="features3 cid-szZ3TwaVaR" id="features3-m">
    
    <div class="mbr-overlay"></div>
    <div class="container">
        <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                <strong>PROMOCIONES</strong></h4>
            
        </div>
        <div class="row mt-4">
            <div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="assets/images/appetite-1238251-1920-2-696x454.jpg" alt="">
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-7"><strong>BROCOLI</strong></h5>
                        
                        <p class="mbr-text mbr-fonts-style mt-3 display-7">Aproveche el descuento de brocolis. Solo por HOY!!!!!!!!!!!!!!!!!!!!!!!!!!! 20% de Descuentoooo!!</p>
                    </div>
                    
                </div>
            </div>
            <div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="assets/images/ironing-403074-1920-696x464.jpg" alt="">
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-7"><strong>PLANCHA&nbsp;</strong></h5>
                        
                        <p class="mbr-text mbr-fonts-style mt-3 display-7">Aproveche el descuento de planchas. Solo por HOY!!!!!!!!!!!!!!!!!!!!!!!!!!! 10% de Descuentoooo!!</p>
                    </div>
                    
                </div>
            </div>
            <div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="assets/images/toy-car-5979409-1920-696x313.jpeg" alt="">
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-7"><strong>CAMION DE JUGUETE</strong></h5>
                        
                        <p class="mbr-text mbr-fonts-style mt-3 display-7">Aproveche el descuento de camiones de juguete. Solo por HOY!!!!!!!!!!!!!!!!!!!!!!!!!!! 45% de Descuentoooo!!<br></p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section><section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/c" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a><p style="flex: 0 0 auto; margin:0; padding-right:1rem;">Page was <a href="https://mobirise.site/h" style="color:#aaa;">made with</a> Mobirise</p></section><script src="assets/web/assets/jquery/jquery.min.js"></script>  <script src="assets/popper/popper.min.js"></script>  <script src="assets/tether/tether.min.js"></script>  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/parallax/jarallax.min.js"></script>  <script src="assets/dropdown/js/nav-dropdown.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>  <script src="assets/theme/js/script.js"></script>  
  
  
</body>
</html>