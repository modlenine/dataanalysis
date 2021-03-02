<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/custom.css" type="text/css" />

	<script src="<?= base_url('assets/') ?>js/jquery.min.js"></script>

	<script src="<?= base_url('asset/') ?>js/control.js"></script>
	<script src="<?= base_url('asset/') ?>js/function.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->


	<style>
		.avatar {
			/* vertical-align: middle; */
			width: 50px;
			height: 50px;
			border-radius: 50%;
			margin-top: -15px;
		}

		.header-misc-icon>a {
			width: 50px;
		}

		#logo img {
			padding: 10px !important;
		}

		 /* thai */
		 @font-face {
            font-family: 'Sarabun';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aAFJn2QN.woff2') ?>) format('woff2');
            unicode-range: U+0E01-0E5B, U+200C-200D, U+25CC;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Sarabun';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aBpJn2QN.woff2') ?>) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Sarabun';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aBtJn2QN.woff2') ?>) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Sarabun';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aBVJnw.woff2') ?>) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        * {
            font-family: 'Sarabun', sans-serif;
        }

        body {
            font-size: .85rem !important;
        }
        .form-control{
            font-size: .85rem !important;
        }
        .process-steps li h5{
            font-size: .85rem !important;
        }
	</style>

</head>
<?=getmodal()?>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="full-header" data-mobile-sticky="true">
			<div id="header-wrap">
				<div class="container">
					<div class="header-row">

						<!-- Logo
						============================================= -->
						<div id="logo">
							<a href="<?= base_url() ?>" class="standard-logo" data-dark-logo="<?= base_url('assets/') ?>images/logo/saleecolour_logo.png"><img src="<?= base_url('assets/') ?>images/logo/saleecolour_logo.png" style="height:50px;"></a>
							<a href="<?= base_url() ?>" class="retina-logo" data-dark-logo="<?= base_url('assets/') ?>images/logo/saleecolour_logo.png"><img src="<?= base_url('assets/') ?>images/logo/saleecolour_logo.png" style="height:50px;"></a>
						</div><!-- #logo end -->

						<div class="header-misc">

							<!-- Top Search
							============================================= -->
							<!-- <div id="top-search" class="header-misc-icon">
								<a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
							</div> -->
							<!-- #top-search end -->

							<!-- Top Cart
							============================================= -->
							<div id="top-cart" class="header-misc-icon d-none d-sm-block">
								<a href="#" id="top-cart-trigger"><img src="<?= linkImg(getUser()->file_img) ?>" alt="Avatar" class="avatar"></a>
								
								<div class="top-cart-content">
									<div class="top-cart-title">
										<h4>User profile</h4>
										<span><b>Name : </b><?=getUser()->Fname." ".getUser()->Lname?></span><br>
										<span><?=getUser()->ecode?></span>
									</div>

									<div class="top-cart-action">
										<a href="<?=base_url('login/logout')?>" class="button button-3d button-small m-0" onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่')">Logout</a>
									</div>
								</div>
							</div><!-- #top-cart end -->

						</div>

						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100">
								<path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
								<path d="m 30,50 h 40"></path>
								<path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
							</svg>
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu">

							<ul class="menu-container">
								<li class="menu-item">
									<a class="menu-link" href="<?= base_url() ?>">
										<div>Home</div>
									</a>
								</li>

								<li class="menu-item">
									<a class="menu-link" href="#">
										<div>Department</div>
									</a>
									<ul class="sub-menu-container">

										<li class="menu-item">
											<a class="menu-link" href="javascript:void(0)">
												<div><i class="icon-line-columns"></i>Production</div>
											</a>
											<ul class="sub-menu-container">
												<li class="menu-item">
													<a class="menu-link" href="<?= base_url('production.html') ?>">
														<div>Graph</div>
													</a>
												</li>
												<li class="menu-item">
													<a class="menu-link" href="<?= base_url('uploaddata_pd.html') ?>">
														<div>Upload fiile</div>
													</a>
												</li>
												<!-- <li class="menu-item">
													<a class="menu-link" href="#"><div>View data upload</div></a>
												</li> -->
												<!-- <li class="menu-item">
													<a class="menu-link" href="mega-menu-side-tab.html"><div>Side-Tabs (onClick)</div></a>
												</li> -->
											</ul>
										</li>
										<!-- <li class="menu-item">
											<a class="menu-link" href="<?= base_url('production.html') ?>"><div><i class="icon-wpforms"></i>Production</div></a>
										</li> -->
										<li class="menu-item">
											<a class="menu-link" href="#">
												<div><i class="icon-wpforms"></i>IT</div>
											</a>
										</li>
										<!-- <li class="menu-item mega-menu mega-menu-small">
											<a class="menu-link" href="widgets.html"><div><i class="icon-gift"></i>Widgets</div></a>
											<div class="mega-menu-content">
												<div class="row mx-0">
													<ul class="sub-menu-container mega-menu-column col">
														<li class="menu-item">
															<a class="menu-link" href="widgets.html"><div>Links</div></a>
														</li>
														<li class="menu-item">
															<a class="menu-link" href="widgets.html"><div>Flickr Photostream</div></a>
														</li>
														<li class="menu-item">
															<a class="menu-link" href="widgets.html"><div>Dribbble Shots</div></a>
														</li>
														<li class="menu-item">
															<a class="menu-link" href="widgets.html"><div>Subscribers</div></a>
														</li>
														<li class="menu-item">
															<a class="menu-link" href="widgets.html"><div>Posts List</div></a>
														</li>
														<li class="menu-item">
															<a class="menu-link" href="widgets.html"><div>Twitter Feed</div></a>
														</li>
														<li class="menu-item">
															<a class="menu-link" href="widgets.html"><div>Tabbed Widgets</div></a>
														</li>
													</ul>
													<ul class="sub-menu-container mega-menu-column col">
														<li class="menu-item">
															<a class="menu-link" href="widgets.html"><div>Carousel</div></a>
														</li>
														<li class="menu-item">
															<a class="menu-link" href="widgets.html"><div>Social Icons</div></a>
														</li>
														<li class="menu-item">
															<a class="menu-link" href="widgets.html"><div>Testimonials</div></a>
														</li>
														<li class="menu-item">
															<a class="menu-link" href="widgets.html"><div>Quick Contact</div></a>
														</li>
														<li class="menu-item">
															<a class="menu-link" href="widgets.html"><div>Tags Cloud</div></a>
														</li>
														<li class="menu-item">
															<a class="menu-link" href="widgets.html"><div>Video Embeds</div></a>
														</li>
														<li class="menu-item">
															<a class="menu-link" href="widgets.html"><div>Raw HTML</div></a>
														</li>
													</ul>
												</div>
											</div>
										</li> -->

									</ul>
								</li>
							</ul>

						</nav><!-- #primary-menu end -->

						<form class="top-search-form" action="search.html" method="get">
							<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
						</form>

					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->

</body>

</html>