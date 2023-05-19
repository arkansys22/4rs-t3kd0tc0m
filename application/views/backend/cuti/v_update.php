
<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pengajuan Cuti</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>paneladmin/cuti">Daftar Cuti</a></li>
            <li class="breadcrumb-item active">Pengajuan Cuti</li>
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
                        <input type="text" class="form-control" value="<?php echo $rows['username'] ?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Mulai Tanggal</label>
                        <input type="date" class="form-control" value="<?=$rows['cuti_start'] ?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <input type="date" class="form-control" value="<?=$rows['cuti_end'] ?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 col-form-label">Cuti Status</label>
                    <div class="col-sm-12">
                      <select name='cuti_status' class="form-control select2" style="width: 100%;">
                        <?php foreach ($records as $row) {
                          if ($rows['cuti_status_id'] == $row['cuti_status_id']){
                            echo"<option selected='selected' value='$row[cuti_status_nama]'>$row[cuti_status_nama]</option>";
                          }else{
                            echo"<option value='$row[cuti_status_nama]'>$row[cuti_status_nama]</option>";
                       }
                     } ?>
                    </select>
                    </div>
                  </div>
                </div></div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" name ="submit" class="btn btn-success" title="Simpan"><i class="fas fa-file-upload"></i> Simpan</button>
                <a class="btn btn-primary" title="Batal" href="<?php echo base_url()?>paneladmin/cuti"><i class="fab fa-creative-commons-sa"></i> Batal</a>

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
