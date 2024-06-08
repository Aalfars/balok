<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $title ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url('assets/cozastore/') ?>images/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/cozastore/') ?>vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/cozastore/') ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/cozastore/') ?>fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/cozastore/') ?>fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/cozastore/') ?>vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/cozastore/') ?>vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/cozastore/') ?>vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/cozastore/') ?>vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/cozastore/') ?>vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/cozastore/') ?>vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/cozastore/') ?>vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/cozastore/') ?>vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/cozastore/') ?>css/util.css">
	<!-- SweetAlert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/cozastore/') ?>css/main.css">
	<style>
		/* CSS for transparent navbar */
		.header-transparent {
			background: transparent;
			transition: background 0.3s ease;
		}

		/* Gaya navbar ketika di-scroll: tidak transparan */
		.header-scrolled {
			background: white;
		}
	</style>
	<!--===============================================================================================-->
</head>

<body class="animsition">
	<?php if ($this->session->flashdata('sucess')) : ?>
		<script>
			Swal.fire({
				icon: 'success',
				title: '<?= $this->session->flashdata('sucess') ?>',
				showConfirmButton: false,
				timer: 1500
			});
		</script>
	<?php endif; ?>

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->


			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="#" class="logo">
						<img src="<?= base_url('assets/cozastore/') ?>	images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<?php
							$segment = $this->uri->segment(2);
							?>

							<ul class="main-menu">
								<li class="<?= ($segment == 'dashboard' || $segment == '') ? 'active-menu' : '' ?>">
									<a href="<?= base_url('Home/dashboard') ?>">Home</a>
								</li>

								<li class="<?= ($segment == 'products') ? 'active-menu' : '' ?>">
									<a href="<?= base_url('Home/products') ?>">All Product</a>
								</li>

								<?php if ($this->session->userdata('logged_in') === true) : ?>
									<li class="<?= ($segment == 'cart' ? 'active-menu' : '') ?>">
										<a href="<?= base_url('Home/cart') ?>">Cart</a>
									</li>
								<?php endif; ?>

								<li class="<?= ($segment == 'blog') ? 'active-menu' : '' ?>">
									<a href="<?= base_url('Home/blog') ?>">Blog</a>
								</li>

								<li class="<?= ($segment == 'about') ? 'active-menu' : '' ?>">
									<a href="<?= base_url('Home/about') ?>">About</a>
								</li>

								<?php if ($this->session->userdata('logged_in') !== true) : ?>
									<li class="<?= ($segment == 'Auth' ? 'active-menu' : '') ?>">
										<a href="<?= base_url('Home/Auth') ?>" style="color:red;">Login</a>
									</li>
								<?php else : ?>
									<?php if ($this->session->userdata('level') == 'Seller'): ?>
										<li class="<?= ($segment == 'backend' ? 'active-menu' : '') ?>">
											<a target="blank" href="<?= base_url('Seller/dashboard') ?>" style="color:green;">Menu Seller</a>
										</li>
									<?php endif; ?>
									<?php if ($this->session->userdata('level') == 'Admin'): ?>
										<li class="<?= ($segment == 'backend' ? 'active-menu' : '') ?>">
											<a et="blank"  href="<?= base_url('Admin/dashboard') ?>" style="color:green;">Menu Admin</a>
										</li>
									<?php endif; ?>
									
									<li class="">
										<a href="<?= base_url('Home/Auth/logout') ?>" style="color:red;">Log Out</a>
									</li>
								<?php endif; ?>
							</ul>
						</ul>

					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header- js-show-cart">
							<i class="zmdi zmdi-border-all"></i>
						</div>


					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="index.html"><img src="<?= base_url('assets/cozastore/') ?>images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">

			<ul class="main-menu-m">
				<li>
					<a href="index.html">Home</a>

					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.html">All Product</a>
				</li>

				<li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Cart</a>
				</li>

				<li>
					<a href="blog.html">Blog</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>


			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					PesananKu
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<?php foreach ($pesanan as $aa) { ?>
						<li class="header-cart-item flex-w flex-t m-b-12">
							<div class="header-cart-item-img">
								<img src="<?= base_url('assets/upload/foto_produk/' . $aa->gambar) ?>" alt="IMG">
							</div>

							<div class="header-cart-item-txt p-t-8">
								<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
									<?= $aa->nama_produk ?>
								</a>

								<span class="header-cart-item-info">
									Status : <?= $aa->status_pengiriman ?>
								</span>
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="container">
		<!-- Toast Container -->


		<?php if ($this->session->flashdata('alert')) : ?>
			<script>
				Swal.fire({
					icon: 'error',
					title: '<?= $this->session->flashdata('alert') ?>',
					showConfirmButton: false,
					timer: 1500
				});
			</script>
		<?php endif; ?>

		<?php echo $contents ?>
	</div>
	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/cozastore/') ?>vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/cozastore/') ?>vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/cozastore/') ?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url('assets/cozastore/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/cozastore/') ?>vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/cozastore/') ?>vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url('assets/cozastore/') ?>vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/cozastore/') ?>vendor/slick/slick.min.js"></script>
	<script src="<?= base_url('assets/cozastore/') ?>js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/cozastore/') ?>vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/cozastore/') ?>vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/cozastore/') ?>vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/cozastore/') ?>vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function() {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/cozastore/') ?>vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<script>
		window.addEventListener('scroll', function() {
			var header = document.querySelector('.header');
			header.classList.toggle('scrolled', window.scrollY > 0);
		});
	</script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/cozastore/') ?>js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>