
<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambahkan Portfolio</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>paneladmin/portfolio">Portfolio</a></li>
            <li class="breadcrumb-item active">Tambah portfolio</li>
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
            echo form_open_multipart('paneladmin/portfolio_tambahkan',$attributes); ?>
              <div class="card-body">
                <div class="form-group">

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Judul SEO</label>
                        <input type="text" class="form-control" name="portfolio_judul" placeholder="Judul SEO">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="portfolio_judul_konten" placeholder="Judul">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Link Portfolio</label>
                        <input type="text" class="form-control" name="portfolio_url" placeholder="http://namadomain.com">
                      </div>
                    </div>
                  </div>                 
                  
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Kategori</label>
                        <div class="col-sm-12">
                          <select name='portfolio_cat_id_session' class="form-control select2" style="width: 100%;">
                          <option value=""></option>
                            <?php foreach ($records as $row) {
                              if ($rows['portfolio_cat_id_session'] == $row['portfolio_cat_id_session']){
                                echo"<option selected='selected' value='$row[portfolio_cat_id_session]'>$row[portfolio_cat_judul]</option>";
                              }else{
                                echo"<option value='$row[portfolio_cat_id_session]'>$row[portfolio_cat_judul]</option>";
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
                        <textarea class="textarea"  name ="portfolio_desk" style="width: 100%; height: 100px;"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Meta SEO</label>
                        <input type="text" class="form-control" name="portfolio_meta_desk" placeholder="Meta description">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Kata Kunci</label>
                        <input type="text" class="form-control tags" id="blogs_keyword" value="" name="portfolio_keyword"  data-role="tagsinput"/>
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
                <a class="btn btn-outline-info" title="Cancel" href="<?php echo base_url()?>paneladmin/services"><i class="fab fa-creative-commons-sa"></i> Batal</a>

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
