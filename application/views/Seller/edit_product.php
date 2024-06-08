<h3>Edit Product</h3>
<?php foreach($product as $aa){ ?>
    <a href="<?=base_url('assets/upload/foto_produk/'.$aa->gambar)?>" target="_blank">
        <i class="fa fa-image"></i> Foto Produk |
    </a>
    <a href="<?=base_url('assets/upload/bukti_lokal/'.$aa->bukti_lokal)?>" target="_blank">
        <i class="fa fa-file-pdf-o"></i> Bukti Lokal
    </a>
    <form method="post" action="<?=base_url('Seller/Products/update/'. $aa->produk_id)?>" enctype="multipart/form-data" >
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Nama Produk</label>
        <input type="hidden" name="namafoto" value="<?= $aa->gambar ?>">
        <input type="hidden" name="id" value="<?= $aa->produk_id ?>">
        <input type="hidden" name="status_verifikasi" value="<?= $aa->status_verifikasi ?>">
    <input type="hidden" name="namafile" value="<?= $aa->bukti_lokal ?>">
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_produk" placeholder=" Ex: Kaos" required value="<?=$aa->nama_produk?>">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Harga</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" name="harga" placeholder=" " value="<?=$aa->harga?>"required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="nama">Stok</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" name="stok" placeholder=" " required value="<?=$aa->stok?>">
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
        <textarea type="text" class="form-control" id="myTextarea" name="deskripsi" rows="6" placeholder=""required ><?=$aa->deskripsi?></textarea>
      </div>
    </div>
   
    <div class="col-md-6">
      <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" class="form-control" id="exampleFormControlInput1" name="foto" placeholder="Teori MU calon degradasi" accept="image/png, image/jpeg"> </input>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="foto">Bukti Lokal (PDF)</label>
        <input type="file" class="form-control" id="exampleFormControlInput1" name="bukti_lokal" placeholder="Teori MU calon degradasi" accept=".pdf "> </input>
      </div>
    </div>
    <button type="submit" class="btn bg-gradient-success">Add</button>
</form>
<?php } ?>