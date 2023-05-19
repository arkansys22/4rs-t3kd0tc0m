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
              <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
                <div class="product-image">
                   <img id="product_img" src='<?php echo base_url()?>bahan/foto_products/<?php echo $posts->services_gambar ?>' data-zoom-image="<?php echo base_url()?>bahan/foto_products/<?php echo $posts->services_gambar ?>"/>

                </div>
              </div>
              <div class="col-lg-7 col-md-6">
                  <div class="pr_detail">
                    <div class="product-description">
                      <div class="product-title">
                        <h4><?php echo $posts->services_judul_konten ?></h4>
                      </div>
                      <div class="product_price float-left">
                          <ins>Rp<?php echo number_format($posts->services_harga,0,',','.') ?></ins>
                      </div>
                      <div class="product-rate float-right">
                          <?php echo $cat['products_cat_judul']?>
                      </div>
                      <div class="clearfix"></div>
                      <hr />
                      <p><?php echo $posts->services_desk ?></p>
                    </div>
                    <hr />
                    <div>
                      <div class="cart_btn">
                        <a class="btn btn-default radius_none btn-addtocart" href="https://api.whatsapp.com/send?phone=<?php echo $identitas->whatsapp?>&text=Hi,%20<?php echo $identitas->nama_website?>.%20I%20want%20rent%20<?php echo $posts->services_judul_konten ?> for <?php echo $cat['products_cat_judul']?>.%20How%20to%20order%20it%20?"><i class="ion-android-cart"></i> ORDER</a>

                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr />
                    <div class="product_share d-block d-sm-flex align-items-center">
                      <span>Share with:</span>
                        <ul class="list_none social_icons">
                              <li><a href="http://www.facebook.com/sharer.php?u=<?php echo base_url("services/$posts->services_judul_seo ") ?>" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo base_url("services/$posts->services_judul_seo ")?>','newwindow','width=400,height=350');  return false;" title="Facebook" target="_blank""><i class="ion-social-facebook"></i></a></li>
                              <li><a href="whatsapp://send?text=Find <?php echo $posts->services_judul_konten ?> rental car at <?php echo $identitas->nama_website?> with affordable price Rp<?php echo number_format($posts->services_harga,0,',','.') ?> | please click <?php echo base_url("services/$posts->services_judul_seo ") ?> for more information">
                              <i class="ion-social-whatsapp"></i></a></li>
                        </ul>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="small_pt">
  	<div class="container">
      	<div class="row">
          	<div class="col-12">
              	<div class="heading_s3">
                  	<h4>Releated Rent Car For <?php echo $cat['products_cat_judul']?></h4>
                  </div>
              </div>
          </div>
          <div class="row">
          	<div class="col-12">
              	<div class="carousel_slide4 owl-carousel owl-theme nav_top" data-margin="30" data-nav="true" data-dots="false">
                  <?php $services = $this->Crud_m->view_where_orderings('services',array('services_status'=>'publish','products_cat_id'=>$cat['products_cat_id']),'services_id','ASC'); ?>
                  <?php foreach ($services as $post_services) {  ?>
                      <div class="item">
                      	<div class="shop-item">
                              <div class="product text-center">
                                  <div class="product_img">
                                      <a href="<?php echo base_url() ?>services/<?php echo $post_services->services_judul_seo?>">
                                      <?php if(empty($post_services->services_gambar)) {
                                          echo "<img src='".base_url()."bahan/foto_products/noimage.jpg'>";
                                        }else {
                                          echo " <img src='".base_url('./bahan/foto_products/'.$post_services->services_gambar)."'>

                                          ";}
                                       ?>
                                       </a>

                                  </div>
                                  <div class="product_info">
                                      <div class="product_title">
                                          <h5><a href="<?php echo base_url() ?>services/<?php echo $post_services->services_judul_seo?>"><?php echo $post_services->services_judul_konten?></a></h5>
                                      </div>
                                      <div class="product_price">
                                          <ins>Rp<?php echo number_format($post_services->services_harga,0,',','.')?></ins>
                                      </div>
                                  </div>
                              </div>
                      	</div>
                      </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
      </div>
  </section>

  <footer class="pattern_top footer_dark">
    <div class="top_footer" style="background-color:#2b78bd;">
          <div class="container">
              <div class="row">
                  <div class="col-lg-5 col-md-6 mb-4 mb-lg-0 animation" data-animation="fadeInUp" data-animation-delay="0.2s">
                    <div class="footer_logo">
                        <a href="<?php echo base_url()?>"><img alt="logo" src="<?php echo base_url()?>bahan/backend/foto/<?php echo $identitas->logo?>"></a>
                      </div>
                      <p><?php echo $identitas->slogan?></p>
                      <ul class="contact_info contact_info_light list_none">
                          <li>
                              <span class="ti-location-pin"></span>
                              <address><?php echo $identitas->alamat?></address>
                          </li>
                          <li>
                              <span class="ti-email"></span>
                              <a href="mailto:<?php echo $identitas->email?>"><?php echo $identitas->email?></a>
                          </li>
                          <li>
                              <span class="ti-mobile"></span>
                              <p><?php echo $identitas->no_telp?></p>
                          </li>
                      </ul>
                  </div>

                  <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 animation" data-animation="fadeInUp" data-animation-delay="0.4s">
                    <h6 class="widget_title">TRENDING JOURNEY</h6>
                      <ul class="recent_post border_bottom_dash list_none">
                        <?php $blogs = $this->Crud_m->view_where_orderings_limit('blogs',array('blogs_status'=>'publish'),'blogs_dibaca','desc','3','1'); ?>
                            <?php foreach ($blogs as $post_blog) {
                                $tgl_posting = $this->mylibrary->tgl_indo($post_blog->blogs_post_tanggal);
                              ?>
                              <li>
                                  <div class="post_footer">
                                      <div class="post_img">
                                          <a href="#">
                                            <?php if(empty($post_blog->blogs_gambar)) {
                                                echo "<img src='".base_url()."bahan/foto_products/noimage.jpg'>";
                                              }else {
                                                echo " <img src='".base_url('./bahan/foto_blogs/'.$post_blog->blogs_gambar)."'>

                                                ";}
                                             ?>
                                           </a>
                                        </div>
                                        <div class="post_content">
                                          <h6><a href="<?php echo base_url() ?>blogs/<?php echo $post_blog->blogs_judul_seo?>"><?php echo $post_blog->blogs_judul?></a></h6>
                                            <p class="small m-0"><?php echo $post_blog->blogs_dibaca?> views</p>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                      </ul>
                  </div>
                  <div class="col-lg-3 col-md-6 animation" data-animation="fadeInUp" data-animation-delay="0.5s">
                      <h6 class="widget_title">OUR SOSIAL MEDIA</h6>
                      <ul class="list_none footer_social">
                        <li><a href="https://api.whatsapp.com/send/?phone=<?php echo $identitas->whatsapp ?>&text=Hallo+Komodo+Transport.."><i class="ion-social-whatsapp-outline"></i></a></li>
                        <li><a href="<?php echo $identitas->facebook?>"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="<?php echo $identitas->instagram?>"><i class="ion-social-instagram-outline"></i></a></li>
                        <li><a href="<?php echo $identitas->youtube?>"><i class="ion-social-youtube-outline"></i></a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <?php $this->load->view('frontend/v_footer')?>
  </footer>
  <!-- END FOOTER SECTION -->

  <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>



  <?php $this->load->view('frontend/js')?>

</body>
</html>
