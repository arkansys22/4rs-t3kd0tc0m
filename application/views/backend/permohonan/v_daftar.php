<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Permohonan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Daftar Permohonan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <a class="btn btn-success btn-sm" title="Edit Data" href="<?php echo base_url()?>paneladmin/permohonan_tambahkan"><i class="fas fa-plus-circle"></i> Tambahkan</a>
                <div class="btn-group">
                  <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Status Pemohon <span class="caret"></span>
                  </button>
                  <div class="dropdown-menu">
                    <?php foreach ($status_1 as $row) { ?>
                    <a class="dropdown-item" tabindex="-1" href="<?php base_url ()?>permohonan_detail/<?=$row['permohonan_status_id']?>"><?=$row['permohonan_status']?></a>
                    <?php } ?>
                  </div>
                </div>


                </h3>

              <h3 class="text-right">

                <a class="btn btn-danger btn-sm" title="Edit Data" href="<?php echo base_url()?>paneladmin/permohonan_storage_bin"><i class="fas fa-trash"></i> Sampah</a>
              </h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Pemohon</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($record as $row){

                  ?>

                <tr>
                  <td><?=$row['products_judul']?></td>
                  <td><?=$row['products_disc_end']?></td>
                  <td><?=$row['permohonan_status']?></td>
                  <td>
                    <?php
                    echo"
                    <a class='btn btn-primary btn-sm' title='Edit Data' href='".base_url()."paneladmin/permohonan_update/$row[products_id]'><i class='fas fa-edit'></i></a>
                    <a class='btn btn-danger btn-sm' title='Delete Data' href='".base_url()."paneladmin/permohonan_delete_temp/$row[products_id]' onclick=\"return confirm('Yakin mau buang Pemohon ini?')\"><i class='fas fa-trash-alt'></i></a>";
                    ?>
                  </td>
                </tr>
              <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Pemohon</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </section>
</div>

<?php $this->load->view('backend/bottom')?>
