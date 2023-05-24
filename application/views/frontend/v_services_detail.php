<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $posts->services_judul ?> | <?php echo $identitas->nama_website?></title>
  <meta name="title" content="<?php echo $posts->services_judul ?> | <?php echo $identitas->nama_website?>">
  <meta property="og:title" content="<?php echo $posts->services_judul ?> | <?php echo $identitas->nama_website?>">
  <meta NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
  <meta name="site_url" content="<?php echo base_url()?>services/<?php echo $posts->services_judul_seo ?>">
  <meta name="description" content="<?php echo $posts->services_meta_desk ?>">
  <meta name="keywords" content="<?php echo $posts->services_keyword ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="msvalidate.01" content="" />
  <meta name="web_author" content="desainboz">
  <link rel="alternate" href="<?php echo base_url()?>" hreflang="id" />
  <link href='<?php echo base_url()?>' rel='canonical'/>
  <meta property="og:site_name" content="<?php echo $identitas->nama_website?>">
  <meta property="og:description" content="<?php echo $posts->services_meta_desk ?>">
  <meta property="og:url" content="<?php echo base_url()?>services/<?php echo $posts->services_judul_seo ?>">
  <meta property="og:image" content="<?php echo base_url()?>bahan/foto_products/<?php echo $posts->services_gambar ?>">
  <meta property="og:image:url" content="<?php echo base_url()?>bahan/foto_products/<?php echo $posts->services_gambar ?>">
  <meta property="og:type" content="article">
  <link rel="shortcut icon" href="<?php echo base_url()?>bahan/backend/foto/<?php echo $identitas->favicon?>" type="image/x-icon">
  <?php $this->load->view('frontend/analytics')?>
    <?php $this->load->view('frontend/css')?>


</head>

<body>
  <div class="preloader">
      <div class="loader_grid">
        <div class="loader_box loader_box1"></div>
        <div class="loader_box loader_box2"></div>
        <div class="loader_box loader_box3"></div>
        <div class="loader_box loader_box4"></div>
        <div class="loader_box loader_box5"></div>
        <div class="loader_box loader_box6"></div>
        <div class="loader_box loader_box7"></div>
        <div class="loader_box loader_box8"></div>
        <div class="loader_box loader_box9"></div>
      </div>
  </div>
  <?php $this->load->view('frontend/menu')?>
  <?php $cat = $this->Crud_m->view_join_where_array('products_category','services','products_cat_id',array ('services.products_cat_id' => $posts->products_cat_id))->row_array(); ?>
  <section class="small_pb">
      <div class="container">
          <div class="row">
              <div class="col-lg-4 col-md-3 mb-3 mb-md-0">
                <div class="pricing_box pricing_style2 animation" data-animation="flipInY" data-animation-delay="0.2s">
                    <div class="pr_title bg-white" style="text-align:left;">
                        <h4 ><?php echo $posts->services_judul_konten?></h4>
                        <p><?php echo $posts->services_meta_desk?></p>                                                 
                     
                    </div>
                    <div class="pr_content border-bottom" style="text-align:left;">                                      
                         <?php echo $posts->services_desk?>
                    </div>
                </div>    
              </div>
              <div class="col-lg-8 col-md-8 "> 
              <?php $services_sub = $this->Crud_m->view_where_orderings('services_sub1',array('services_sub1_status'=>'publish','services_id_session'=>$posts->services_id_session),'services_sub1_id','ASC'); ?>         
                    <div class="row">               
                         
                        <?php foreach ($services_sub as $services) {  ?>       
                         <div class="col-lg-4 col-md-4">
                            <div class="pricing_box pricing_style2 animation" data-animation="flipInY" data-animation-delay="0.2s">
                              <div class="pr_title bg-white" style="text-align:left;">
                                  <h3>Diskon <?php echo $services->services_sub1_harga_percent?>%</h3><br>
                                  <h4 ><?php echo $services->services_sub1_judul_konten?></h4>
                                  <p><?php echo $services->services_sub1_total_bulan?> Bulan</p>
                                  <?php $a = $services->services_sub1_harga - ($services->services_sub1_harga * ($services->services_sub1_harga_percent/100))?>
                                                        <h4>Rp <?php echo number_format($a,0,',','.') ?><span style="font-size:12px;">/ bulan</span></h4>
                                  <br>Total 
                                  <?php $b = $a * $services->services_sub1_total_bulan ?>
                                  <h4>Rp <?php echo number_format($b,0,',','.') ?></h4>
                                  <?php $c = $services->services_sub1_harga * $services->services_sub1_total_bulan ?>
                                  <del>Rp <?php echo number_format($c,0,',','.') ?></del>                                                 
                                  
                              </div>
                              <div class="pr_content border-bottom" style="text-align:left;">                                      
                                   <?php echo $services->services_sub1_desk?>
                              </div>
                              <div class="pr_footer text-center" >
                                    <a href="https://api.whatsapp.com/send/?phone=<?php echo $identitas->whatsapp ?>&text=Hallo+Arsatek.+Saya+ingin+membuat+<?php echo $services->services_sub1_judul_konten?>+untuk+awal+bisnis+saya.+Bisa+bantu+saya+mewujudkannya?.." class="btn btn-outline-default btn-md btn-radius mb-2" >Pilih Paket Ini</a>
                                  </div>
                            </div>
                         </div>
                        <?php } ?>
                                            
                    </div>
                    
                    <hr />
                    <div class="product_share d-block d-sm-flex align-items-center">
                      <span>Share with:</span>
                        <ul class="list_none social_icons">
                            
                              <li><a href="whatsapp://send?text=Find <?php echo $posts->services_judul_konten ?> rental car at <?php echo $identitas->nama_website?> with affordable price Rp<?php echo number_format($posts->services_harga,0,',','.') ?> | please click <?php echo base_url("services/$posts->services_judul_seo ") ?> for more information">
                              <i class="ion-social-whatsapp"></i></a>
                            </li>
                        </ul>
                    </div>
                  
              </div>
          </div>
      </div>
  </section>

  

   <footer class="pattern_top footer_dark">    
        <?php $this->load->view('frontend/v_footer')?>       
    </footer>
  <!-- END FOOTER SECTION -->

  <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>



  <?php $this->load->view('frontend/js')?>

</body>
</html>
