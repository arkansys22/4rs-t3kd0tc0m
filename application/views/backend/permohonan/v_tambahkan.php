
<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambahkan Permohonan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>paneladmin/permohonan">Permohonan</a></li>
            <li class="breadcrumb-item active">tambahkan Permohonan</li>
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
            echo form_open_multipart('paneladmin/permohonan_tambahkan',$attributes); ?>
              <div class="card-body">
                <div class="form-group">

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Nama Pemohon</label>
                        <input type="text" class="form-control" name="products_judul" placeholder="Nama Lengkap">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 col-form-label">Lowongan Divisi</label>
                    <div class="col-sm-12">
                      <select name='products_desk' class="form-control select2" style="width: 100%;">
                        <?php foreach ($records as $row) {
                          if ($rows['products_id'] == $row['products_id']){
                            echo"<option selected='selected' value='$row[products_judul] $row[products_cat_judul]'>$row[products_judul] $row[products_cat_judul]</option>";
                          }else{
                            echo"<option value='$row[products_judul] $row[products_cat_judul]'>$row[products_judul] $row[products_cat_judul]</option>";
                       }
                     } ?>
                    </select>
                    </div>
                  </div>
                </div></div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Jadwal</label>
                        <input type="date" class="form-control" name="products_disc_end">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Status</label>
                        <select name='permohonan_stat_id' class="form-control select2" style="width: 100%;">
                          <?php foreach ($record_status as $row) {
                            if ($rows['permohonan_stat_id'] == $row['permohonan_status_id']){
                              echo"<option selected='selected' value='$row[permohonan_status_id]'>$row[permohonan_status]</option>";
                            }else{
                              echo"<option value='$row[permohonan_status_id]'>$row[permohonan_status]</option>";
                         }
                       } ?>
                      </select>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" name ="submit" class="btn btn-success" title="Tambahkan"><i class="fas fa-file-upload"></i> Tambahkan</button>
                <a class="btn btn-outline-info" title="Cancel" href="<?php echo base_url()?>paneladmin/permohonan"><i class="fab fa-creative-commons-sa"></i> Batal</a>

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
