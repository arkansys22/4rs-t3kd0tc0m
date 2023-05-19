<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sampah Permohonan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="<?php echo base_url()?>paneladmin/permohonan">Permohonan</a></li>
            <li class="breadcrumb-item active">Sampah Permohonan</li>
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
              <h3 class="card-title"><a class="btn btn-success btn-sm" title="Edit Data" href="<?php echo base_url()?>paneladmin/permohonan">Kembali ke permohonan</a></h3>
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
                  $tgl_posting = $this->mylibrary->tgl_indo($row['products_post_tanggal']);
                  ?>

                <tr>
                  <td><?=$row['products_judul']?></td>
                  <td><?=$row['products_disc_end']?></td>
                  <td><?=$row['permohonan_status']?></td>
                  <td>
                    <?php
                    echo"<a class='btn btn-primary btn-sm' title='Ubah' href='".base_url()."paneladmin/permohonan_restore/$row[products_id]'><i class='fab fa-creative-commons-sa'></i></a>
                    <a class='btn btn-danger btn-sm' title='Hapus Permanen' href='".base_url()."paneladmin/permohonan_delete/$row[products_id]' onclick=\"return confirm('Yakin ingin menghapus permanen permohonan ini?')\"><i class='fas fa-trash-alt'></i></a>";
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
