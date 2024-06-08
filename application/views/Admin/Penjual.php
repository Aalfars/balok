
<div  class="ilang" id="ilang">
   <?php echo $this->session->flashdata('alert', true); ?>
   </div>    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduser">
  Add User
</button>

<!-- Modal -->
<div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Penjual</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" action="<?=base_url('admin/penjual/simpan')?>">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" placeholder="Paijo" required >
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Username</label>
        <input type="text" class="form-control" id="exampleFormControlInput1"  name="username" placeholder="Evos.Galang*6638"required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Email</label>
        <input type="email" class="form-control" id="exampleFormControlInput1"  name="email" placeholder="Evos.Galang*6638"required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Password</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="*****"  ">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Nomor Telepon</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" name="nomor_telepon" placeholder="  "  ">
        <input type="hidden" name="level" value="Seller">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Alamat</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3"></textarea>
      </div>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
  </div>
</div>
  
        </form>

    <div class="card">
  <div class="table-responsive">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Identitas</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Telepon</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Transaksi</th>

        </tr>
      </thead>
      <tbody>
      <?php  
        $no = 1;
        foreach($list_user as $user){
        ?>
        <tr>
          <td>
            <div class="d-flex px-2 py-1">
              <div>
              </div>
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><?=$user->nama_penjual?></h6>
                <p class="text-xs text-secondary mb-0">@<?=$user->username?></p>
              </div>
            </div>
          </td>
          <td>  
            <p class="text-xs font-weight-bold mb-0"><?=$user->email?></p>
          </td>
          <td>  
            <p class="text-xs font-weight-bold mb-0"><?=$user->nomor_telepon?></p>
          </td>
          <td>  
            <p class="text-xs font-weight-bold mb-0"><?=$user->alamat?></p>
          </td>
          <td class="align-middle" style="margin-top: 10px;">
            <button type="button" class="btn bg-gradient-warning" data-original-title="Edit " data-bs-toggle="modal" data-bs-target="#edit<?=$user->penjual_id?>">
              Edit
            </button>
            <a onClick="return confirm('Apakah anda yakin ingin menghapus user ini?')" href="<?=base_url('admin/penjual/delete_user/'.$user->penjual_id)?>" class="btn bg-gradient-danger" data-toggle="tooltip" data-original-title="Delete">
              Delete
            </a>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0">Upcoming</p>
          </td>
        </tr>
        <div class="modal fade" id="edit<?=$user->penjual_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" action="<?=base_url('admin/update_user')?>">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" placeholder="Paijo" required value="<?=$user->nama_penjual?>">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Username</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" readonly value="<?=$user->username?>"name="username" placeholder="Evos.Galang*6638"required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Email</label>
        <input type="email" class="form-control" id="exampleFormControlInput1"  value="<?=$user->email?>"name="email" placeholder="Evos.Galang*6638"required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Password</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="*****"  ">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Nomor Telepon</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" name="nomor_telepon" placeholder="*****"  ">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Alamat</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3"></textarea>
      </div>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
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
