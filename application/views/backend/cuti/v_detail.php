
<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cuti</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>paneladmin/cuti">Daftar Cuti</a></li>
            <li class="breadcrumb-item active">Cuti</li>
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
            echo form_open_multipart('paneladmin/cuti_update',$attributes); ?>


              <div class="card-body">
                <div class="form-group">
                  <input type="hidden" name="cuti_id" value="<?php echo $rows['cuti_id'] ?>">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Nama Karyawan</label>
                        <p><?php echo $rows['username'] ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Mulai Tanggal</label>
                        <p><?=$rows['cuti_start'] ?></p>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <p><?=$rows['cuti_end'] ?></p>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Alasan</label>
                        <p><?=$rows['cuti_alasan'] ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <label>Cuti Status</label>
                    <p>  <p><?=$rows['cuti_status'] ?></p>
                    </p>
                  </div>
                </div></div>
                </div>
              </div>
              <div class="card-footer">
                <a class="btn btn-primary" title="Kembali" href="<?php echo base_url()?>paneladmin/cuti"><i class="fab fa-creative-commons-sa"></i> Kembali</a>

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
