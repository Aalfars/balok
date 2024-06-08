<div class="container" style="margin-top: 5%;">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <span class="stext-109 cl4">
            Cart
        </span>
    </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-xl-12 m-lr-auto m-b-100">
                <div class="m-l-25 m-r-38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Image</th>
                                <th class="column-2">Product</th>
                                <th class="column-3">Harga</th>
                                <th class="column-4">Jumlah</th>
                                <th class="column-5">Total</th>
                                <th class="column-6">Alamat pengiriman</th>
                                <th class="column-7">Aksi</th>
                            </tr>
                            <?php foreach($cart_items as $item): ?>
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="<?=base_url('assets/upload/foto_produk/'.$item->gambar);?>" alt="IMG-PRODUCT">
                                    </div>
                                </td>
                                <td class="column-2"><?= $item->nama_produk ?></td>
                                <td class="column-3">Rp. <?= number_format($item->harga); ?></td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>
                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="jumlah"  value="<?= $item->jumlah; ?>" min="1" >
                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5 total-price">Rp. <?= number_format($item->harga * $item->jumlah) ?></td>
                                <td>
                                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                            <div class="p-t-15">
                                                <div class="bor8 bg0 m-b-22">
                                                    <textarea required class="row-6" name="alamat" id="alamat-<?=$item->keranjang_id?>" oninput="checkAlamat(<?=$item->keranjang_id?>)"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" id="checkout-btn-<?=$item->keranjang_id?>" onclick="validateCheckout(<?=$item->keranjang_id?>)">
                                        Checkout
                                    </button>
                                </td>
                            </tr>

                            <!-- Payment Modal -->
                            <div class="modal fade" style="margin-top:5%" id="paymentModal<?=$item->keranjang_id?>" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel<?=$item->keranjang_id?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="paymentModalLabel<?=$item->keranjang_id?>">Pembayaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" >
                                            <img src="<?=base_url('assets/qr.png')?>" alt="QR Code" class="img-fluid">
                                            <form id="payment-form-<?=$item->keranjang_id?>" action="<?= base_url('home/products/checkout') ?>" method="post">
                                                <input type="hidden" name="produk_id" value="<?= $item->produk_id ?>">
                                                <input type="hidden" name="jumlah" value="<?= $item->jumlah ?>">
                                                <input type="hidden" name="alamat" id="checkout-alamat-<?=$item->keranjang_id?>">
                                                <input type="hidden" name="harga" value="<?= $item->harga ?>">
                                                <input type="hidden" name="penjual_id" value="<?= $item->penjual_id ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary" id="confirm-payment-<?=$item->keranjang_id?>" onclick="setAlamat(<?=$item->keranjang_id?>)">Sudah Bayar</button>
                                        </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
function checkAlamat(keranjang_id) {
    var alamatInput = document.getElementById('alamat-' + keranjang_id).value;
    var checkoutBtn = document.getElementById('checkout-btn-' + keranjang_id);
    if (alamatInput.trim() === '') {
        checkoutBtn.disabled = true;
    } else {
        checkoutBtn.disabled = false;
    }
}

function setAlamat(keranjang_id) {
    var alamatInput = document.getElementById('alamat-' + keranjang_id).value;
    document.getElementById('checkout-alamat-' + keranjang_id).value = alamatInput;
}

function validateCheckout(keranjang_id) {
    var alamatInput = document.getElementById('alamat-' + keranjang_id).value;
    if (alamatInput.trim() === '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Alamat pengiriman harus diisi!',
        });
    } else {
        // Buka modal pembayaran jika alamat telah diisi
        $('#paymentModal' + keranjang_id).modal('show');
    }
    document.addEventListener("DOMContentLoaded", function() {
    <?php if($this->session->flashdata('pesanan_berhasil')): ?>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Pesanan Berhasil dibuat",
            showConfirmButton: false,
            timer: 1500
        });
    <?php endif; ?>
});
}
</script>
