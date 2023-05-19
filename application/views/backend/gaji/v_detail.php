
<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>paneladmin/gaji">Daftar Slip Gaji</a></li>
            <li class="breadcrumb-item active">Slip Gaji</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-wallet"></i> Slip Gaji LOGAYA
                    <small class="float-right">Date: <?=tgl_indo($rows['gaji_post_tanggal'])?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Dari
                  <address>
                    <strong><?=$rows['gaji_update_oleh']?></strong><br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Untuk
                  <address>
                    <strong> <?php foreach ($record as $row) {
                          if ($rows['gaji_id_user'] == $row['id_user']){
                            echo"$row[username]";
                       }
                     } ?></strong><br>
                     <?=$rows['gaji_jabatan']?>
                  </address>
                </div>
              </div>
              <!-- /.row -->
              <div class="row">
                
                <!-- /.col -->
                <div class="col-lg-6 col-sm-12">

                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                    <tr>
                        <th style="width:50%">Uang makan :</th>
                        <td>Rp. <?=number_format($rows['gaji_makan'],0,',','.')?></td>
                      </tr>
                      <tr>
                        <th>Uang transport :</th>
                        <td>Rp. <?=number_format($rows['gaji_transport'],0,',','.')?></td>
                      </tr>
                      <tr>
                        <th>Gaji pokok :</th>
                        <td>Rp. <?=number_format($rows['gaji_pokok'],0,',','.')?></td>
                      </tr>
                      <tr>
                        <th>Insentif :</th>
                        <td>Rp. <?=number_format($rows['gaji_lemburan'],0,',','.')?></td>
                      </tr>
                      <tr>
                        <th>THR :</th>
                        <td>Rp. <?=number_format($rows['gaji_thr'],0,',','.')?></td>
                      </tr>
                      <tr>
                          <?php $total = $rows['gaji_makan'] + $rows['gaji_transport'] + $rows['gaji_pokok'] + $rows['gaji_lemburan'] + $rows['gaji_thr']?>
                        <th>Total:</th>
                        <td>Rp. <?=number_format($total,0,',','.')?></td>
                      </tr>
                      <tr>
                        <th>Potongan pinjaman :</th>
                        <td>- Rp. <?=number_format($rows['gaji_pinjaman'],0,',','.')?></td>
                      </tr>
                      <tr>
                          <?php $total2 = $total - $rows['gaji_pinjaman'] ?>
                        <th>Total sisa:</th>
                        <td>Rp. <?=number_format($total2,0,',','.')?></td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- accepted payments column -->
                <div class="col-lg-6 col-sm-12">
                  <p class="lead">Metode Transfer :</p>
                  <img src="<?php echo base_url()?>bahan/backend/foto/bca2.png" alt="Bank BCA">
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   Gaji akan ditransfer ke rekening pribadi karyawan
                  </p>
                  <img class="img-fluid mb-3" src="<?php echo base_url()?>bahan/foto_gaji/<?php echo $rows['gaji_gambar'] ?>" alt="Belum ada bukti pembayaran">
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

</div>
  <!-- /.content-wrapper -->


<?php $this->load->view('backend/bottom')?>
