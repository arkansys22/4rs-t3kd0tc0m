<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Cuti</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Daftar Cuti</li>
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
                <a class="btn btn-success btn-sm" title="Edit Data" href="<?php echo base_url()?>paneladmin/cuti_tambahkan"><i class="fas fa-plus-circle"></i> Tambahkan</a>
                </h3>

              <h3 class="text-right"><a class="btn btn-danger btn-sm" title="Edit Data" href="<?php echo base_url()?>paneladmin/cuti_storage_bin"><i class="fas fa-trash"></i> Sampah</a></h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama karyawan</th>
                  <th>Mulai tanggal</th>
                  <th>Sampai tanggal</th>
                  <th>Alasan cuti</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($record as $row){

                  ?>

                <tr>
                  <td><?= isset($no) ? ++$no : $no=1 ?> </td>
                  <td><?=$row['nama']?></td>
                  <td><?=$row['cuti_start']?></td>
                  <td><?=$row['cuti_end']?></td>
                  <td><?=$row['cuti_alasan']?></td>
                  <td><?=$row['cuti_status']?></td>
                  <td>
                      
                       <?php
                    echo"
                    <a class='btn btn-primary btn-sm' title='Lihat' href='".base_url()."paneladmin/cuti_detail/$row[cuti_id]'><i class='fas fa-eye'></i></a>
                    <a class='btn btn-danger btn-sm' title='Delete Data' href='".base_url()."paneladmin/cuti_delete_temp/$row[cuti_id]' onclick=\"return confirm('Yakin mau buang daftar cuti ini?')\"><i class='fas fa-trash-alt'></i></a>";
                    ?>
                    <?php
                    if($this->session->level=='2' OR $this->session->level=='1'){echo"
                    <a class='btn btn-primary btn-sm' title='Edit Data' href='".base_url()."paneladmin/cuti_update/$row[cuti_id]'><i class='fas fa-edit'></i></a> ";
                    }?>
                  </td>
                </tr>
              <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama karyawan</th>
                  <th>Mulai tanggal</th>
                  <th>Sampai tanggal</th>
                  <th>Alasan cuti</th>
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
