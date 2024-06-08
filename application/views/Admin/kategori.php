
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" action="<?=base_url('admin/kategori/tambah')?>">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Nama Kategori</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="kategori" placeholder="Ex: Baju" required>
      </div>
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">add</button>
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
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
          
        </tr>
      </thead>
      <tbody>
      <?php  
        $no = 1;
        foreach($kategori as $user){
        ?>
        <tr>
          <td>
            <div class="d-flex px-2 py-1">
              <div>
              </div>
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><?=$user->kategori?></h6>
              </div>
            </div>
          </td>
          <td class="align-middle" style="margin-top: 10px;">
            <button type="button" class="btn bg-gradient-warning" data-original-title="Edit " data-bs-toggle="modal" data-bs-target="#edit<?=$user->kategori_id?>">
              Edit
            </button>
            <a onClick="return confirm('Apakah anda yakin ingin menghapus user ini?')" href="<?=base_url('admin/kategori/delete/'.$user->kategori_id)?>" class="btn bg-gradient-danger" data-toggle="tooltip" data-original-title="Delete">
              Delete
            </a>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0">Upcoming</p>
          </td>
        </tr>
        <div class="modal fade" id="edit<?=$user->kategori_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" action="<?=base_url('admin/kategori/edit')?>">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" placeholder="Paijo" required value="<?=$user->kategori?>">

        <input type="hidden" name="kategori_id" value=""<?=$user->kategori_id?>">
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
