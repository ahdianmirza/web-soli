<!DOCTYPE html>
<html lang="en">

<head>
	<!-- META -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">

	<!-- TITLE -->
	<title>Sistem Online Laboratorium IPB</title>

	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700%7CRoboto:400,400i,700" rel="stylesheet">

	<!-- ICONS -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/pe-icon-7-stroke.css">

	<!-- LIBRARIES -->
	<link rel="stylesheet" type="text/css" href="css/slick.css">
	<link rel="stylesheet" type="text/css" href="css/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
	<!-- STYLES -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="service-page service-page-04">

	<!-- preloader -->
	<div class="corporex-preloader">
		<div class="spinner-wrapper">
			<div class="spinner"></div>
		</div><!-- .spinner-wrapper -->
	</div> <!-- .corporex-preloader -->

	<header class="site-header">
		<nav class="navbar corporex-navbar navbar-01">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-items" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<i class="fa fa-bars"></i>
					</button>

					<a class="navbar-brand" href="#"><img src="img/ipb_2.png" width="100 px" height="68 px" alt="Logo IPB"></a>

				</div> <!-- .navbar-header -->

				<div class="collapse navbar-collapse navbar-items" id="navbar-items">
					<ul class="nav navbar-nav navbar-right">
					<li>
							<a href="/login">Login</a>
						</li>
						<li>
							<a href="/">Beranda</a>
						</li>
						
						<li class="active"><a href="/kontak">Kontak</a></li>

					</ul> <!-- .nav navbar-nav -->
				</div> <!-- .collapse navbar-collapse -->

			</div> <!-- .container -->
		</nav> <!-- .navbar -->
	</header> <!-- .site-header -->

	<section class="hero-area">
		<div class="page-title-banner">
			<div class="container">
				<div class="content-wrapper">
					<h2>Kontak</h2>
					<ul class="bread-crumb">
						<li><a href="/">Beranda</a></li>
						<li><a href="/kontak">Kontak</a></li>
					</ul>
				</div> <!-- .content-wrapper -->
			</div> <!-- .container -->
		</div> <!-- .page-title-banner -->
	</section> <!-- .hero-area -->

	<section class="contact-section page-content">
		<div class="container">
			<div class="contact-options section-block">
				<div class="row">
					<div class="col-md-4">
						<div class="icon-box"><i class="fa fa-map-marker"></i></div>
						<h3>Address</h3>
						<p>20, Bardeshi, Amin Bazar <br> Savar, Dhaka</p>
					</div> <!-- .col-md-4 -->
					<div class="col-md-4">
						<div class="icon-box"><i class="fa fa-phone"></i></div>
						<h3>Phone</h3>
						<a href="#">+8801679252595</a>
					</div> <!-- .col-md-4 -->
					<div class="col-md-4">
						<div class="icon-box"><i class="fa fa-envelope-o"></i></div>
						<h3>Email</h3>
						<a href="#">hello@corporex.com</a>
					</div> <!-- .col-md-4 -->
				</div> <!-- .row -->
			</div> <!-- .contact-options -->
			<div class="contact-form-block">
				<div class="row">
					<div class="col-md-7 form-block">
						<h2>Say Hello</h2>
						<div class="form-message">
							<p></p>
						</div> <!-- .form-message -->
						<form id="corporex-contact" method="POST" action="php/form-handler.php">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="author" class="sr-only">Name:</label>
										<input class="form-control" type="text" name="author" id="author" placeholder="Name *">
									</div> <!-- .form-group -->
									<div class="form-group">
										<label for="email" class="sr-only">Email:</label>
										<input class="form-control" type="email" name="email" id="email" placeholder="Email *">
									</div> <!-- .form-group -->
									<div class="form-group">
										<label for="url" class="sr-only">Url:</label>
										<input class="form-control" type="url" name="url" id="url" placeholder="Website">
									</div> <!-- .form-group -->
									<div class="form-group">
										<label for="phone" class="sr-only">Phone:</label>
										<input class="form-control" type="text" name="phone" id="phone" placeholder="Phone">
									</div> <!-- .form-group -->
								</div> <!-- .col-md-6 -->
								<div class="col-md-6">
									<div class="form-group">
										<label for="comment" class="sr-only">Comment:</label>
										<textarea class="form-control" name="comment" id="comment" placeholder="Write your comment here *"></textarea>
									</div> <!-- .form-group -->
									<button class="btn btn-main">Submit</button>
								</div> <!-- .col-md-6 -->
							</div> <!-- .row -->
						</form>
					</div> <!-- .col-md-7 -->
					<div class="col-md-5 map-block">
						<h3>Location</h3>
						<div class="map-box" id="map-box">

						</div> <!-- .map-box -->
					</div> <!-- .col-md-5 -->
				</div> <!-- .row -->
			</div> <!-- .contact-form -->
		</div> <!-- .container -->
	</section> <!-- .portfolio-section -->



	<footer class="site-footer">
		<div class="footer-blocks">
			<div class="container">
				<div class="row">
					<div class="col-md-4 footer-about">
						<h3 class="widget-title">Kontak</h3>
						<p style="font-weight:bold">
							Jl. Raya Dramaga
							Kampus IPB Dramaga Bogor
							16680 West Java, Indonesia
						</p>
						<p style="font-weight:bold">
							+62 251 8622642
						</p>
						<p style="font-weight:bold">
							ask@apps.ipb.ac.id
						</p>
						<ul class="list-inline footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						</ul> <!-- .footer-social -->
					</div> <!-- col-md-4 footer-about -->
					<div class="col-md-4 widget widget-gallery">
						<h3 class="widget-title">Support</h3>
						<p class="bold-text">
							<a href="https://ict.ipb.ac.id/layanan-helpdesk/">
								IPB Mobile</a>
						</p>
						<p class="bold-text">
							<a href="https://apps.ipb.ac.id/">
								IPB Apps</a>
						</p>
						<p class="bold-text">
							<a href="https://ict.ipb.ac.id/layanan-helpdesk/">
								IPB Mobile</a>
						</p>
					</div> <!-- col-md-4 widget-gallery -->
					<div class="col-md-4 widget widget-gallery">
						<h3 class="widget-title">Quick Links</h3>
						<p class="bold-text">
							<a href="https://repository.ipb.ac.id/">
								Scientific Repository</a>
						</p>
						<p class="bold-text">
							<a href="https://journal.ipb.ac.id/">
								Electronic Journal</a>
						</p>
						<p class="bold-text">
							<a href="https://class.ipb.ac.id/">
								e-Learning</a>
						</p>
					</div> <!-- col-md-4 widget-gallery -->
				</div> <!-- .row -->
			</div> <!-- .container -->
		</div> <!-- .footer-blocks -->
		<div class="bottom-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<p>All rights reserved &copy; 2018 <strong>Storm &amp; Rain</strong></p>
					</div> <!-- .col-md-6 -->
					<div class="col-md-6">
						<ul class="bottom-links">
							<li><a href="#">Terms &amp; Condition</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Help</a></li>
						</ul> <!-- .bottom-links -->
					</div> <!-- .col-md-6 -->
				</div> <!-- .row -->
			</div> <!-- .container -->
		</div> <!-- .bottom-bar -->
	</footer> <!-- .site-footer -->

	<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/jquery.easypiechart.min.js"></script>
	<script src="js/script.js"></script>
</body>

</html>