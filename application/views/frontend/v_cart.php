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
                          <li>Keranjang Belanja</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--breadcrumbs area end-->
  <!--shopping cart area start -->
  <div class="cart_page_bg">
      <div class="container">
          <div class="shopping_cart_area">
              <form action="<?php echo base_url()?>Product/ubah_cart" method="post" name="frmShopping" class="form-horizontal" enctype="multipart/form-data">
                      <div class="row">
                          <div class="col-12">
                              <div class="table_desc">
                                  <div class="cart_page table-responsive">
                                    <?php
                                        if ($cart = $this->cart->contents())
                                            {
                                     ?>
                                      <table>

                                          <thead>
                                              <tr>
                                                <th></th>
                                                  <th class="product_name">Produk</th>
                                                  <th class="product_quantity">Jumlah</th>
                                                  <th class="product_total">Total</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                              $grand_total = 0;
                                              foreach ($cart as $items ):
                                              $grand_total = $grand_total + $items['subtotal'];
                                              $product_total = $items['price'] * $items['qty'];
                                            ?>
                                            <input type="hidden" name="cart[<?php echo $items['products_id'];?>][products_id]" value="<?php echo $items['products_id'];?>" />
                                            <input type="hidden" name="cart[<?php echo $items['products_id'];?>][rowid]" value="<?php echo $items['rowid'];?>" />
                                            <input type="hidden" name="cart[<?php echo $items['products_id'];?>][price]" value="<?php echo $items['price'];?>" />
                                            <input type="hidden" name="cart[<?php echo $items['products_id'];?>][qty]" value="<?php echo $items['qty'];?>" />
                                            <input type="hidden" name="cart[<?php echo $items['products_id'];?>][gambar]" value="<?php echo $items['gambar'];?>" />


                                              <tr>
                                                <td class="product_name"><img src="<?php echo base_url()?>bahan/foto_products/<?php echo $items['gambar']; ?>" alt=""></td>
                                                  <td class="product_name">
                                                      <?php echo $items['name']; ?> (size <?php echo $items['options']; ?> ) - Rp. <?php echo number_format($items['price'],0,",","."); ?>

                                                  </td>
                                                  <td class="product_quantity">
                                                    <input min="1" max="100" type="number" value="<?php echo $items['qty']; ?>" name="cart[<?php echo $items['products_id'];?>][qty]" >
                                                    <a href="<?php echo base_url()?>product/hapus_cart/<?php echo $items['rowid'];?>"><i class="fa fa-trash-o"></i></a></td>
                                                  <td class="product_total">Rp. <?php echo number_format($product_total, 0,",","."); ?></td>
                                                  <?php endforeach; ?>
                                              </tr>
                                          </tbody>

                                      </table>


                                  </div>
                                  <div class="cart_submit">
                                      <button type="submit">perbaharui</button>
                                  </div>
                              </div>
                           </div>
                       </div>
                       <!--coupon code area start-->
                      <div class="coupon_area">
                          <div class="row">
                              <div class="col-lg-6 col-md-6">
                            
                              </div>
                              <div class="col-lg-6 col-md-6">
                                  <div class="coupon_code right">
                                      <div class="coupon_inner">
                                         <div class="cart_subtotal">
                                             <p></p>
                                             <p class="cart_amount"> Order Total Rp. <?php echo number_format($grand_total, 0,",","."); ?></p>
                                         </div>
                                         <div class="cart_subtotal">
                                             <p></p>
                                             <p>Ongkos kirim ditampilkan di tahap berikutnya.</p>
                                         </div>
                                         <div class="checkout_btn">
                                             <a href="<?php echo base_url()?>checkout">SELESAIKAN PESANAN</a>
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
                      <!--coupon code area end-->
                  </form>
          </div>
      </div>
  </div>
  <!--shopping cart area end -->

  			</div>
  		</div>
  	</div>

    <?php $this->load->view('frontend/bottom')?>
    <?php $this->load->view('frontend/js')?>
</div>
</body>
</html>
