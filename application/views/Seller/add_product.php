<h3>Add Product</h3>
    <form method="post" action="<?=base_url('Seller/Products/simpan')?>" enctype="multipart/form-data" >
    <?php echo $this->session->flashdata('alert'); ?>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Nama Produk</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_produk" placeholder=" Ex: Kaos" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Harga</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" name="harga" placeholder=" " required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Stok</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" name="stok" placeholder=" " required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="level">Kategori</label>
        <select name="kategori" class="form-control"id="level" required>
            <?php
            foreach($list_kategori as $kategori){?>
            <option value="<?=$kategori->kategori?>"><?=$kategori->kategori?></option>
            <?php }?>
        </select>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group">
        <label for="nama">Deskripsi</label>
        <textarea type="text" class="form-control" id="myTextarea" name="deskripsi" rows="6" placeholder="Teori MU calon degradasi"required ></textarea>
      </div>
    </div>
   
    <div class="col-md-6">
      <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" class="form-control" id="exampleFormControlInput1" name="foto" placeholder="Teori MU calon degradasi"required accept="image/png, image/jpeg"> </input>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="foto">Bukti Lokal (PDF)</label>
        <input type="file" class="form-control" id="exampleFormControlInput1" name="bukti_lokal" placeholder="Teori MU calon degradasi"required accept=".pdf "> </input>
      </div>
    </div>
    <button type="submit" class="btn bg-gradient-success">Add</button>
</form>
