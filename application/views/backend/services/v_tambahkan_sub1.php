
<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambahkan Layanan / Services Sub</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>paneladmin/services_sub1">Layanan</a></li>
            <li class="breadcrumb-item active">Tambah Layanan Sub</li>
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
            echo form_open_multipart('paneladmin/services_sub1_tambahkan',$attributes); ?>
              <div class="card-body">
                <div class="form-group">

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Judul SEO</label>
                        <input type="text" class="form-control" name="services_sub1_judul" placeholder="Judul SEO Layanan">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="services_sub1_judul_konten" placeholder="Judul layanan">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Harga Real</label>  
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                          </div>
                          <input type="number" class="form-control" name="services_sub1_harga" >
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Persentase Diskon</label>   
                        <div class="input-group mb-3">
                          <input type="number" class="form-control" name="services_sub1_harga_percent" placeholder="99">
                          <div class="input-group-append">
                            <span class="input-group-text">%</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Harga Modal</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                          </div>
                          <input type="number" class="form-control" name="services_sub1_harga_modal" >
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Durasi</label>
                        <div class="input-group mb-3">
                          <input type="number" class="form-control" name="services_sub1_total_bulan" placeholder="12">
                          <div class="input-group-append">
                            <span class="input-group-text">Bulan</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>                 
                  
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Kategori</label>
                        <div class="col-sm-12">
                          <select name='services_id_session' class="form-control select2" style="width: 100%;">
                            <?php foreach ($records as $row) {
                              if ($rows['services_id_session'] == $row['services_id_session']){
                                echo"<option selected='selected' value='$row[services_id_session]'>$row[services_judul]</option>";
                              }else{
                                echo"<option value='$row[services_id_session]'>$row[services_judul]</option>";
                              }
                            } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Isi Konten</label>
                        <textarea class="textarea"  name ="services_sub1_desk" style="width: 100%; height: 100px;"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Meta SEO</label>
                        <input type="text" class="form-control" name="services_sub1_meta_desk" placeholder="Meta description">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Kata Kunci</label>
                        <input type="text" class="form-control tags" id="blogs_keyword" value="" name="services_keyword"  data-role="tagsinput"/>
                          <?php foreach ($tag as $tag){    } ?>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Gambar</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="gambar" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Tambah Gambar</label>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="card-footer">
                <button type="submit" name ="submit" class="btn btn-success" title="Add"><i class="fas fa-file-upload"></i> Tambahkan</button>
                <a class="btn btn-outline-info" title="Cancel" href="<?php echo base_url()?>paneladmin/services_sub1"><i class="fab fa-creative-commons-sa"></i> Batal</a>

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
