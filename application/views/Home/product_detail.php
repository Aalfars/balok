<?php foreach ($product as $aa) { ?>
	<div class="container" style="margin-top:5%;">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
				<?= $aa->kategori ?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?= $aa->nama_produk ?>
			</span>
		</div>
	</div>
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">

							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb slick-initialized slick-slider slick-dotted">
								<div class="slick-list draggable">
									<div class="slick-track" style="opacity: 1; width: 1539px;">
										<div class="item-slick3 slick-slide" data-thumb="<?= base_url('assets/upload/foto_produk/') ?><?= $aa->gambar ?>" data-slick-index="0" aria-hidden="true" tabindex="-1" role="tabpanel" id="slick-slide10" aria-describedby="slick-slide-control10" style="width: 513px; position: relative; left: 0px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms ease 0s;">
											<div class="wrap-pic-w pos-relative">
												<img src="<?= base_url('assets/upload/foto_produk/' . $aa->gambar) ?>" alt="IMG-PRODUCT">

												<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?= base_url('assets/upload/foto_produk/') ?><?= $aa->gambar ?>" tabindex="-1">
													<i class="fa fa-expand"></i>
												</a>
											</div>
										</div>
										<div class="item-slick3 slick-slide" data-thumb="images/product-detail-02.jpg" data-slick-index="1" aria-hidden="true" tabindex="-1" role="tabpanel" id="slick-slide11" aria-describedby="slick-slide-control11" style="width: 513px; position: relative; left: -513px; top: 0px; z-index: 998; opacity: 0;">
											<div class="wrap-pic-w pos-relative">
												<img src="" <?= base_url('assets/upload/foto_produk/') ?><?= $aa->gambar ?>" alt="IMG-PRODUCT">

												<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg" tabindex="-1">
													<i class="fa fa-expand"></i>
												</a>
											</div>
										</div>
										<div class="item-slick3 slick-slide slick-current slick-active" data-thumb="images/product-detail-03.jpg" data-slick-index="2" aria-hidden="false" tabindex="0" role="tabpanel" id="slick-slide12" aria-describedby="slick-slide-control12" style="width: 513px; position: relative; left: -1026px; top: 0px; z-index: 999; opacity: 1;">
											<div class="wrap-pic-w pos-relative">
												<img src="<?= base_url('assets/upload/foto_produk/') ?><?= $aa->gambar ?>" alt="IMG-PRODUCT">

												<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg" tabindex="0">
													<i class="fa fa-expand"></i>
												</a>
											</div>
										</div>
									</div>
								</div>




							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?= $aa->nama_produk ?>
						</h4>

						<span class="mtext-106 cl2">
							Rp. <?= number_format($aa->harga) ?>
						</span>

						<p class="stext-102 cl3 p-t-23">
							Penjual : <?= $aa->username ?>
						</p>
						<p class="stext-102 cl3 p-t-23">
							Stok : <?= $aa->stok ?>
						</p>

						<!--  -->

						<form action="<?= base_url('Home/Products/add_to_cart') ?>" method="post">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">

										<input type="hidden" value="<?= $aa->produk_id ?>" name="produk_id">
										<input type="hidden" value="<?= $aa->penjual_id ?>" name="penjual_id">

										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>
										<input class="mtext-104 cl3 txt-center num-product" type="number" name="jumlah" value="1" min="1" max="<?= $aa->stok; ?>">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
									<div class="row">
										<?php if ($this->session->userdata('logged_in') !== true) : ?>
											<a href="<?= base_url('Home/Auth') ?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
												Login
											</a>
										<?php else : ?>
											<button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
												Tambah ke Keranjang
											</button>
										<?php endif; ?>


						</form>
					</div>
				</div>
			</div>
		</div>

		<!--  -->

		</div>
		</div>
		</div>

		<div class="bor10 m-t-50 p-t-43 p-b-40">
			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item p-b-10">
						<a class="nav-link " data-toggle="tab" href="#description" role="tab">Deskripsi</a>
					</li>

				</ul>
				<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
								<?=$aa->deskripsi?>
							</div>
						</div>

				<!-- Tab panes -->

			</div>
		</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
		
			<span class="stext-107 cl6 p-lr-25">
				Categories: <?=$aa->kategori?>
			</span>
		</div>
	</section>
<?php } ?>