<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Lowongan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Daftar Lowongan</li>
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
                <a class="btn btn-success btn-sm" title="Edit Data" href="<?php echo base_url()?>paneladmin/lowongan_tambahkan"><i class="fas fa-plus-circle"></i> Tambahkan</a>
                </h3>

              <h3 class="text-right"><a class="btn btn-danger btn-sm" title="Edit Data" href="<?php echo base_url()?>paneladmin/lowongan_storage_bin"><i class="fas fa-trash"></i> Sampah</a></h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Lowongan</th>
                  <th>Jumlah Lowongan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($record as $row){

                  ?>

                <tr>
                  <td><?=$row['products_judul']?> <?=$row['divisi_judul']?></td>
                  <td><?=$row['products_harga']?></td>
                  <td>
                    <?php
                    echo"
                    <a class='btn btn-primary btn-sm' title='Edit Data' href='".base_url()."paneladmin/lowongan_update/$row[products_id]'><i class='fas fa-edit'></i></a>
                    <a class='btn btn-danger btn-sm' title='Delete Data' href='".base_url()."paneladmin/lowongan_delete_temp/$row[products_id]' onclick=\"return confirm('Yakin mau buang lowongan ini?')\"><i class='fas fa-trash-alt'></i></a>";
                    ?>
                  </td>
                </tr>
              <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>Date</th>
                  <th>Title</th>
                  <th>Action</th>
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
