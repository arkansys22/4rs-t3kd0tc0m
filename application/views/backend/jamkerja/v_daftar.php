<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Waktu Kerja</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Waktu Kerja</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Keterangan</th>
                  <th>Jam Mulai</th>
                  <th>Jam Selesai</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($record as $row){

                  ?>

                <tr>
                  <td><?= isset($no) ? ++$no : $no=1 ?> </td>
                  <td><?=$row['user_jam_judul']?></td>
                  <td><?=$row['user_jam_mulai']?></td>
                  <td><?=$row['user_jam_selesai']?></td>
                  <td>
                    <?php
                    echo"<a class='btn btn-primary btn-sm' title='Edit Data' href='".base_url()."paneladmin/jam_kerja_update/$row[user_jam_judul_seo]'><i class='fas fa-edit'></i></a>";
                    ?>
                  </td>
                </tr>
              <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Keterangan</th>
                  <th>Jam Mulai</th>
                  <th>Jam Selesai</th>
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
