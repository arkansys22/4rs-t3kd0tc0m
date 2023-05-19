<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sampah Pengumuman</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="<?php echo base_url()?>paneladmin/pengumuman">Pengumuman</a></li>
            <li class="breadcrumb-item active">Sampah Pengumuman</li>
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
              <h3 class="card-title"><a class="btn btn-success btn-sm" title="Edit Data" href="<?php echo base_url()?>paneladmin/pengumuman">Kembali ke pengumuman</a></h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Judul Pengumuman</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($record as $row){
                  ?>

                <tr>
                  <td><?= isset($no) ? ++$no : $no=1 ?> </td>
                  <td><?=tgl_indo($row['pengumuman_tgl'])?></td>
                  <td><?=$row['pengumuman_judul']?></td>
                  <td>
                    <?php
                    echo"<a class='btn btn-primary btn-sm' title='Edit' href='".base_url()."paneladmin/pengumuman_restore/$row[pengumuman_id]'><i class='fab fa-creative-commons-sa'></i></a>
                    <a class='btn btn-danger btn-sm' title='Permanently Delete' href='".base_url()."paneladmin/pengumuman_delete/$row[pengumuman_id]' onclick=\"return confirm('Yakin ingin menghapus permanen pengumuman ini?')\"><i class='fas fa-trash-alt'></i></a>";
                    ?>
                  </td>
                </tr>
              <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Judul Pengumuman</th>
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
