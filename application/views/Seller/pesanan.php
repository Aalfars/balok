</form>
    <div class="card">
  <div class="table-responsive">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Produk</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">tanggal</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nota</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>

        </tr>
      </thead>
      <tbody>
      <?php  
        $no = 1;
        foreach($pesanan as $user){
        ?>
        <tr>
          <td>
            <div class="d-flex px-2 py-1">
              <div>
              </div>
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><?=$user->nama_produk?></h6>
              </div>
            </div>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0"><?=$user->tanggal_pesan?></p>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0"><?=$user->nota?></p>
          </td>
          <td class="align-middle" style="margin-top: 10px;">
            <button type="button" class="btn bg-gradient-warning" data-original-title="approve " data-bs-toggle="modal" data-bs-target="#approve<?=$user->pesanan_id?>">
              detail
            </button>
            <a onClick="return confirm('Apakah anda yakin ingin menghapus user ini?')" href="<?=base_url('admin/Penjualan/delete/'.$user->pesanan_id)?>" class="btn bg-gradient-danger" data-toggle="tooltip" data-original-title="Delete">
              Delete
            </a>
          </td>
       
        </tr>
        <div class="modal fade" id="approve<?=$user->pesanan_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" action="<?=base_url('admin/penjualan/approve/'. $user->pesanan_id)?>">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Nama Produk</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" readonly name="nama" placeholder="Paijo" required value="<?=$user->nama_produk?>">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Jumlah</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" readonly name="nama" placeholder="Paijo" required value="<?=$user->jumlah?>">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Username Penjual</label>
        <input type="teks" class="form-control" id="exampleFormControlInput1" readonly value="<?=$user->username?>"name="username" placeholder="Evos.Galang*6638"required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Alamat</label>
        <input type="teks" class="form-control" id="exampleFormControlInput1" readonly value="<?=$user->pesanan_alamat?>"name="alamat" placeholder="Evos.Galang*6638"required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Nota</label>
        <input type="teks" class="form-control" id="exampleFormControlInput1" readonly value="<?=$user->nota?>"name="alamat" placeholder="Evos.Galang*6638"required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Total Yang dibayar</label>
        <input type="teks" class="form-control" id="exampleFormControlInput1" readonly value="Rp. <?=number_format($user->jumlah*$user->harga)?>"name="alamat" placeholder="Evos.Galang*6638"required>
      </div>
    </div>
  
    
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Approve</button>
      </div>
    </div>
  </div>
</div>
  </div>
</div>
  
        </form>

            <?php } ?>
      </tbody>
    </table>