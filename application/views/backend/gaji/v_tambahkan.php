
<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambahkan Slip Gaji</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>paneladmin/gaji">Gaji</a></li>
            <li class="breadcrumb-item active">Tambahkan Slip Gaji</li>
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
            echo form_open_multipart('paneladmin/gaji_tambahkan',$attributes); ?>
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6">
                  <div class="form-group">
                    <label>Nama Karyawan</label>
                      <select name='gaji_id_user' class="form-control select2" style="width: 100%;">
                        <?php foreach ($record as $row) {
                          if ($rows['products_cat_id'] == $row['id_user']){
                            echo"<option selected='selected' value='$row[id_user]'>$row[nama]</option>";
                          }else{
                            echo"<option value='$row[id_user]'>$row[nama]</option>";
                       }
                     } ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" name="gaji_jabatan" placeholder="Jabatan">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Uang makan</label>
                    <input type="number" class="form-control" name="gaji_makan" placeholder="Uang makan">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Uang transport</label>
                    <input type="number" class="form-control" name="gaji_transport" placeholder="Uang transport">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Gaji Pokok</label>
                    <input type="number" class="form-control" name="gaji_pokok" placeholder="Gaji Pokok">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Lemburan</label>
                    <input type="number" class="form-control" name="gaji_lemburan" placeholder="Lemburan">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Tunjangan Hari Raya</label>
                    <input type="number" class="form-control" name="gaji_thr" placeholder="Tunjangan Hari Raya">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Potongan Pinjaman</label>
                    <input type="number" class="form-control" name="gaji_pinjaman" placeholder="Potongan Pinjaman">
                  </div>
                </div>
              </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" name ="submit" class="btn btn-success" title="Simpan"><i class="fas fa-file-upload"></i> Simpan</button>
                <a class="btn btn-outline-info" title="Batal" href="<?php echo base_url()?>paneladmin/gaji"><i class="fab fa-creative-commons-sa"></i> Batal</a>

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
