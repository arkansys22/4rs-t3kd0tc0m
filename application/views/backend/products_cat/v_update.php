
<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Perbarui <?php echo $rows['products_cat_judul'] ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>paneladmin/products_cat">Kategori</a></li>
            <li class="breadcrumb-item active">Perbarui <?php echo $rows['products_cat_judul'] ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12 col-xs-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php $attributes = array('class'=>'form-horizontal','role'=>'form');
            echo form_open_multipart('paneladmin/products_cat_update',$attributes); ?>


              <div class="card-body">
                <div class="form-group">
                  <input type="hidden" name="products_cat_id_session" value="<?php echo $rows['products_cat_id_session'] ?>">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="products_cat_judul" value="<?php echo $rows['products_cat_judul'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="textarea"  name ="products_cat_desk" style="width: 100%; height: 100px;"><?php echo $rows['products_cat_desk'] ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Meta Deskripsi (SEO)</label>
                        <input type="text" class="form-control" name="products_cat_meta_desk" value="<?php echo $rows['products_cat_meta_desk'] ?>">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Kata Kunci</label>
                        <input type="text" class="form-control tags" id="products_keyword" name="products_cat_keyword" value="<?php echo $rows['products_cat_keyword'] ?>">
                      <?php   $_arrNilai = explode(',', $rows['products_cat_keyword']);
                        foreach ($tag as $tag){
                            $_ck = (array_search($tag['keyword_nama_seo'], $_arrNilai) === false)? '' : 'checked';
                         } ?>
                      </div>
                    </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Lihat Gambar</label>
                      <div class="row">
                        <?php if(empty($rows['products_cat_gambar'])) {
                            echo "<img class='img-fluid mb-3' src='".base_url()."bahan/foto_products/noimage.jpg'>";
                          }else {
                            echo " <img class='img-fluid mb-3' src='".base_url('./bahan/foto_products/'.$rows['products_cat_gambar'])."'> ";}
                         ?>
                      </div>

                    </div>
                  </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Gambar</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="gambar">
                          <label class="custom-file-label" for="exampleInputFile"> <?php echo $rows['products_cat_gambar'] ?></label>
                          <small> Dimensi foto Landscape 1920px x 1080px & maksimal ukuran file 1 Mb </small>
                        </div>
                      </div>
                    </div>


                  </div>

                </div>
              </div>
              <div class="card-footer">
                <button type="submit" name ="submit" class="btn btn-success" ><i class="fas fa-file-upload"></i> Simpan</button>
                <a class="btn btn-primary" href="<?php echo base_url()?>paneladmin/products_cat"><i class="fab fa-creative-commons-sa"></i> Batal</a>

              </div>
            <?php echo form_close(); ?>
          </div>


        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

</div>
  <!-- /.content-wrapper -->


<?php $this->load->view('backend/bottom')?>
