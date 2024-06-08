<a href="<?=base_url('seller/products/add_product')?>" class="btn btn-primary" >Tambah Produk</a>
<div class="card">
  <div class="table-responsive">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Produk</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stok</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>

        </tr>
      </thead>
      <tbody>
      <?php  
        $no = 1;
        foreach($products as $aa){
        ?>
        <tr>
          <td>
            <div class="d-flex px-2 py-1">
              <div>
              </div>
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><?=$aa->nama_produk?></h6>
              </div>
            </div>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0"><?=$aa->kategori?></p>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0"><?=$aa->stok?></p>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0"><?=$aa->status_verifikasi?></p>
          </td>
          <td class="align-middle" style="margin-top: 10px;">
          <a href="<?=base_url('seller/products/detail/'.$aa->produk_id)?>" class="btn btn-primary" >Detail</a>
              
            </button>
            <a onClick="return confirm('Apakah anda yakin ingin menghapus user ini?')" href="<?=base_url('seller/products/delete/'.$aa->produk_id)?>" class="btn bg-gradient-danger" data-toggle="tooltip" data-original-title="Delete">
              Delete
            </a>
          </td>

        </tr>
  </div>
</div>
  
        </form>

            <?php } ?>
      </tbody>
    </table>