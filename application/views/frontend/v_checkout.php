<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $identitas->nama_website?> - <?php echo $identitas->slogan?></title>
  <meta name="title" content="<?php echo $identitas->nama_website?> <?php echo $identitas->no_telp?> | <?php echo $identitas->meta_keyword?>">
  <meta property="og:title" content="<?php echo $identitas->nama_website?> <?php echo $identitas->no_telp?> | <?php echo $identitas->meta_keyword?>">
  <meta NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
  <meta name="site_url" content="<?php echo base_url()?>">
  <meta name="description" content="<?php echo $identitas->meta_deskripsi?>">
  <meta name="keywords" content="<?php echo $identitas->meta_keyword?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="msvalidate.01" content="DA329AB9B967ABBCBD6B9280D0C3991A" />
  <meta name="web_author" content="arkansys.com">
  <link rel="alternate" href="<?php echo base_url()?>" hreflang="id" />
  <link href='<?php echo base_url()?>' rel='canonical'/>
  <meta property="og:site_name" content="<?php echo $identitas->nama_website?>">
  <meta property="og:description" content="<?php echo $identitas->meta_deskripsi?>">
  <meta property="og:url" content="<?php echo base_url()?>">
  <meta property="og:image" content="<?php echo base_url()?>bahan/backend/foto/<?php echo $identitas->logo?>">
  <meta property="og:image:url" content="<?php echo base_url()?>bahan/backend/foto/<?php echo $identitas->logo?>">
  <meta property="og:type" content="article">
  <link rel="shortcut icon" href="<?php echo base_url()?>bahan/backend/foto/<?php echo $identitas->favicon?>" type="image/x-icon">
  <?php $this->load->view('frontend/analytics')?>
    <?php $this->load->view('frontend/css')?>


</head>

<body>
  <div class="off_canvars_overlay"> </div>
  <?php $this->load->view('frontend/menu')?>
  <!--breadcrumbs area start-->
  <div class="breadcrumbs_area">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="breadcrumb_content">
                      <ul>
                          <li><a href="<?php echo base_url()?>">Halaman Utama</a></li>
                          <li>Pembayaran</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--Checkout page section-->
  <div class="checkout_page_bg">
      <div class="container">
        <?php
            if ($cart = $this->cart->contents())
                {
         ?>
          <div class="Checkout_section">
              <div class="row">
                 <div class="col-12">
                      <div class="user-actions">
                          <h3>
                              <i class="fa fa-file-o" aria-hidden="true"></i>
                              Sudah pernah beli?
                              <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_login" aria-expanded="true">Langsung Login</a>

                          </h3>
                           <div id="checkout_login" class="collapse" data-parent="#accordion">
                              <div class="checkout_info">
                                  <p>Silakan lakukan login terlebih dahulu untuk melanjutkan pembayaran Anda</p>
                                  <form action="#">
                                      <div class="form_group">
                                          <label>Username </label>
                                          <input type="text">
                                      </div>
                                      <div class="form_group">
                                          <label>Password  </label>
                                          <input type="text">
                                      </div>
                                      <div class="form_group group_3 ">
                                          <button type="submit">Login</button>
                                      </div>
                                      <a href="#">Lupa password?</a>
                                  </form>
                              </div>
                          </div>
                      </div>
                      <div class="user-actions">
                          <h3>
                              <i class="fa fa-file-o" aria-hidden="true"></i>
                              Punya kode voucher?
                              <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_coupon" aria-expanded="true">Masukkan kode voucher</a>

                          </h3>
                           <div id="checkout_coupon" class="collapse" data-parent="#accordion">
                              <div class="checkout_info">
                                  <form action="#">
                                      <input placeholder="Masukkan kode voucher" type="text">
                                      <button type="submit">Gunakan Voucher</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                 </div>
              </div>

              <div class="checkout_form">

                  <div class="row">
                      <div class="col-lg-6 col-md-6">
                          <div class="checkout_form_left">
                            <?php echo form_open('checkout_end'); ?>
                                  <h3>Informasi Pengiriman</h3>
                                  <div class="row">
                                      <div class="col-lg-12 mb-20">
                                          <label>Nama Lengkap </label>
                                          <input type="text" name="nama">
                                      </div>
                                      <div class="col-lg-6 mb-20">
                                          <label>No. Telepon</label>
                                          <input type="text" name="no_tlp">
                                      </div>
                                       <div class="col-lg-6 mb-20">
                                          <label>Alamat Email   </label>
                                            <input type="email" name="email">
                                            <?php echo form_error('email'); ?>
                                      </div>
                                      <div class="col-12 mb-20">
                                          <label>Alamat Lengkap</label>
                                          <input type="text" name="alamat">
                                      </div>
                                      <div class="col-6 mb-20">
                                          <label>Kecamatan </label>
                                          <input  type="text" name="kecamatan">
                                      </div>
                                      <div class="col-6 mb-20">
                                          <label>Kota / Kabupaten </label>
                                          <input  type="text" name="kab">
                                      </div>
                                      <div class="col-6 mb-20">
                                          <label for="country">Provinsi </label>
                                          <input  type="text" name="prov">
                                      </div>
                                      <div class="col-6 mb-20">
                                          <label>Kode Pos</label>
                                          <input  type="text" name="pos">
                                      </div>
                                       <div class="col-12 mb-20">
                                          <label>Negara </label>
                                          <input type="text" name="negara">
                                      </div>
                                      <div class="col-12 mb-20">
                                         <label>Catatan Pengiriman </label>
                                         <input type="text" name="catatan">
                                     </div>
                                      <div class="col-6 mb-20">
                                          <label>Username</label>
                                          <input type="text" name="username">
                                          <small><?php echo form_error('username'); ?></small>
                                      </div>
                                      <div class="col-lg-6 mb-20">
                                          <label>Password</label>
                                          <input type="password" name="password">
                                      </div>
                                      <input type="hidden" name="level" value="4">
                                      <input type="hidden" name="user_status" value="1">
                                      <div class="col-sm-6 mb-20">
                                        <div class="order_button">
                                            <button  type="submit">Selesaikan Pembayaran</button>
                                        </div>
                                      </div>
                                  </div>
                              <?php echo form_close(); ?>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div class="checkout_form_right">
                              <form action="#">
                                  <div class="order_table table-responsive">
                                      <table>

                                          <thead>
                                              <tr>
                                                  <th>Produk</th>
                                                  <th>Total</th>
                                              </tr>
                                          </thead>

                                          <tbody>
                                            <?php
                                              $grand_total = 0;  $i = 1;
                                              foreach ($cart as $items):
                                              $grand_total = $grand_total + $items['subtotal'];
                                              $product_total = $items['price'] * $items['qty'];
                                            ?>
                                              <tr>
                                                  <td> <?php echo $items['name']; ?> (size <?php echo $items['options']; ?> ) <strong> × <?php echo $items['qty']; ?></strong></td>
                                                  <td> Rp. <?php echo number_format($product_total, 0,",","."); ?></td>
                                              </tr>
                                              <?php endforeach; ?>
                                          </tbody>
                                          <tfoot>
                                              <tr>
                                                  <th>Ongkos kirim</th>
                                                  <td><strong>Gratis</strong></td>
                                              </tr>
                                              <tr class="order_total">
                                                  <th>Total</th>
                                                  <td><strong>Rp. <?php echo number_format($grand_total, 0,",","."); ?></strong></td>
                                              </tr>
                                              <tr>
                                                  <th>Transfer Bank BCA <p>Atas Nama : Dhawy Arkan</p></th>
                                                  <td><strong><p> No. Rekening : 23123123</p></strong></td>
                                              </tr>

                                          </tfoot>

                                      </table>
                                  </div>

                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
            }else{
                echo "<h3>Keranjang Belanja masih kosong</h3>";
            }
          ?>
      </div>
  </div>
  <!--Checkout page section end-->

  			</div>
  		</div>
  	</div>

    <?php $this->load->view('frontend/bottom')?>
    <?php $this->load->view('frontend/js')?>
</div>
</body>
</html>
