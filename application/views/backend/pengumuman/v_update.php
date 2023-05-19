
<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Perbarui Pengumuman</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>paneladmin/pengumuman">Daftar Pengumuman</a></li>
            <li class="breadcrumb-item active">Perbarui Pengumuman</li>
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
            echo form_open_multipart('paneladmin/pengumuman_update',$attributes); ?>
              <div class="card-body">
                <div class="form-group">
                  <input type="hidden" name="pengumuman_id" value="<?php echo $rows['pengumuman_id'] ?>">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Judul Pengumuman</label>
                    <input type="text" class="form-control" name="pengumuman_judul" placeholder="Judul Pengumuman" value="<?=$rows['pengumuman_judul']?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Tanggal Pengumuman</label>
                    <input type="date" class="form-control" name="pengumuman_tgl" placeholder="Tanggal Pengumuman" value="<?=$rows['pengumuman_tgl']?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="textarea"  name ="pengumuman_deskripsi" style="width: 100%; height: 100px;"><?php echo $rows['pengumuman_deskripsi'] ?></textarea>
                  </div>
                </div>
              </div>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" name ="submit" class="btn btn-success" title="Simpan"><i class="fas fa-file-upload"></i> Simpan</button>
                <a class="btn btn-primary" title="Batal" href="<?php echo base_url()?>paneladmin/pengumuman"><i class="fab fa-creative-commons-sa"></i> Batal</a>

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
