
<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pengumuman</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>paneladmin/pengumuman">Daftar Pengumuman</a></li>
            <li class="breadcrumb-item active">Pengumuman</li>
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
                    <p><?=$rows['pengumuman_judul']?></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Tanggal Pengumuman</label>
                    <p><?=$rows['pengumuman_tgl']?></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Isi Pengumuman</label>
                    <p><?php echo $rows['pengumuman_deskripsi'] ?></p>
                  </div>
                </div>
              </div>
                </div>
              </div>
              <div class="card-footer">
                <a class="btn btn-primary" title="Kembali" href="<?php echo base_url()?>paneladmin/pengumuman"><i class="fab fa-creative-commons-sa"></i> Kembali</a>

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
