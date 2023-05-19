<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $posts->products_judul ?> - <?php echo $posts->products_keyword ?> | <?php echo $identitas->nama_website?></title>
  <meta name="title" content="<?php echo $posts->products_judul ?> - <?php echo $posts->products_keyword ?> | <?php echo $identitas->nama_website?>">
  <meta property="og:title" content="<?php echo $posts->products_judul ?> - <?php echo $posts->products_keyword ?> | <?php echo $identitas->nama_website?>">
  <meta NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
  <meta name="site_url" content="<?php echo base_url()?>product_detail/<?php echo $posts->products_judul_seo ?>">
  <meta name="description" content="<?php echo $posts->products_meta_desk ?>">
  <meta name="keywords" content="<?php echo $posts->products_keyword ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="msvalidate.01" content="DA329AB9B967ABBCBD6B9280D0C3991A" />
  <meta name="web_author" content="arkansys.com">
  <link rel="alternate" href="<?php echo base_url()?>" hreflang="id" />
  <link href='<?php echo base_url()?>' rel='canonical'/>
  <meta property="og:site_name" content="<?php echo $identitas->nama_website?>">
  <meta property="og:description" content="<?php echo $posts->products_meta_desk ?>">
  <meta property="og:url" content="<?php echo base_url()?>product_detail/<?php echo $posts->products_judul_seo ?>">
  <meta property="og:image" content="<?php echo base_url()?>bahan/foto_products/<?php echo $posts->products_gambar ?>">
  <meta property="og:image:url" content="<?php echo base_url()?>bahan/foto_products/<?php echo $posts->products_gambar ?>">
  <meta property="og:type" content="article">
  <link rel="shortcut icon" href="<?php echo base_url()?>bahan/backend/foto/<?php echo $identitas->favicon?>" type="image/x-icon">
  <?php $this->load->view('frontend/analytics')?>
    <?php $this->load->view('frontend/css')?>


</head>
<body>
    <!--loader-->
    <div class="loader-wrap">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
    <!--loader end-->
    <!-- main start  -->
    <div id="main">
        <!-- header start  -->
        <?php $this->load->view('frontend/menu')?>
        <!-- header end -->
        <!-- wrapper  -->
        <div id="wrapper">
            <div class="content full-height  hidden-item no-mob-hidden">
                <!-- fw-carousel-wrap -->
                <div class="fw-carousel-wrap fsc-holder">
                    <!-- fw-carousel  -->
                    <div class="fw-carousel  fs-gallery-wrap fl-wrap full-height lightgallery thumb-contr" data-mousecontrol="true">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <!-- swiper-slide-->

                                 <?php
                                      if(empty($posts->products_gambar)) {
                                        echo "
                                        <div class='swiper-slide hov_zoom'>
                                        <img src='".base_url()."bahan/foto_products/noimage.jpg'>
                                        <a href='".base_url()."bahan/foto_products/noimage.jpg' class='box-media-zoom   popup-image'><i class='fal fa-search'></i></a>
                                        </div>
                                        ";
                                      }else {
                                        echo "
                                              <div class='swiper-slide hov_zoom'>
                                              <img src='".base_url()."bahan/foto_products/".$posts->products_gambar."'>
                                              <a href='".base_url()."bahan/foto_products/".$posts->products_gambar."' class='box-media-zoom   popup-image'><i class='fal fa-search'></i></a>
                                              </div>
                                         ";}
                                  ?>
                                  <?php
                                       if(empty($posts->products_gambar2)) {
                                         echo "
                                         <div class='swiper-slide hov_zoom'>
                                         <img src='".base_url()."bahan/foto_products/noimage.jpg'>
                                         <a href='".base_url()."bahan/foto_products/noimage.jpg' class='box-media-zoom   popup-image'><i class='fal fa-search'></i></a>
                                         </div>
                                         ";
                                       }else {
                                         echo "
                                               <div class='swiper-slide hov_zoom'>
                                               <img src='".base_url()."bahan/foto_products/".$posts->products_gambar2."'>
                                               <a href='".base_url()."bahan/foto_products/".$posts->products_gambar2."' class='box-media-zoom   popup-image'><i class='fal fa-search'></i></a>
                                               </div>
                                          ";}
                                   ?>
                                   <?php
                                        if(empty($posts->products_gambar3)) {
                                          echo "
                                          <div class='swiper-slide hov_zoom'>
                                          <img src='".base_url()."bahan/foto_products/noimage.jpg'>
                                          <a href='".base_url()."bahan/foto_products/noimage.jpg' class='box-media-zoom   popup-image'><i class='fal fa-search'></i></a>
                                          </div>
                                          ";
                                        }else {
                                          echo "
                                                <div class='swiper-slide hov_zoom'>
                                                <img src='".base_url()."bahan/foto_products/".$posts->products_gambar3."'>
                                                <a href='".base_url()."bahan/foto_products/".$posts->products_gambar3."' class='box-media-zoom   popup-image'><i class='fal fa-search'></i></a>
                                                </div>
                                           ";}
                                    ?>
                                    <?php
                                         if(empty($posts->products_gambar4)) {
                                           echo "
                                           <div class='swiper-slide hov_zoom'>
                                           <img src='".base_url()."bahan/foto_products/noimage.jpg'>
                                           <a href='".base_url()."bahan/foto_products/noimage.jpg' class='box-media-zoom   popup-image'><i class='fal fa-search'></i></a>
                                           </div>
                                           ";
                                         }else {
                                           echo "
                                                 <div class='swiper-slide hov_zoom'>
                                                 <img src='".base_url()."bahan/foto_products/".$posts->products_gambar4."'>
                                                 <a href='".base_url()."bahan/foto_products/".$posts->products_gambar4."' class='box-media-zoom   popup-image'><i class='fal fa-search'></i></a>
                                                 </div>
                                            ";}
                                     ?>
                                     <?php
                                          if(empty($posts->products_gambar5)) {
                                            echo "
                                            <div class='swiper-slide hov_zoom'>
                                            <img src='".base_url()."bahan/foto_products/noimage.jpg'>
                                            <a href='".base_url()."bahan/foto_products/noimage.jpg' class='box-media-zoom   popup-image'><i class='fal fa-search'></i></a>
                                            </div>
                                            ";
                                          }else {
                                            echo "
                                                  <div class='swiper-slide hov_zoom'>
                                                  <img src='".base_url()."bahan/foto_products/".$posts->products_gambar5."'>
                                                  <a href='".base_url()."bahan/foto_products/".$posts->products_gambar5."' class='box-media-zoom   popup-image'><i class='fal fa-search'></i></a>
                                                  </div>
                                             ";}
                                      ?>
                            </div>
                        </div>
                    </div>
                    <!-- fw-carousel end -->
                </div>
                <!--slider-counter-->
                <div class="slider-counter_wrap">
                    <div class="fw-carousel-counter"></div>
                </div>
                <!--slider-counter end-->
                <!--bottom-panel-->
                <div class="bottom-panel single-carousel-control">
                    <div class="bottom-panel-column bottom-panel-column_left fix-size">
                        <div class="single-carousel-control_list">
                            <ul>
                                <li class="show_thumbnails unvisthum">Show Thumbnails</li>
                                <li class="decl shibtn unvisthum2">View Details</li>
                            </ul>
                        </div>
                        <div class="fs-controls_wrap">
                            <div class="fw_cb fw-carousel-button-prev"><i class="fal fa-angle-left"></i></div>
                            <div class="fw_cb fw-carousel-button-next"><i class="fal fa-angle-right"></i></div>
                        </div>
                    </div>
                    <div class="bottom-panel-column bottom-panel-column_right fix-size">
                        <div class="half-scrollbar">
                            <div class="hs_init"></div>
                        </div>
                    </div>
                </div>
                <!--bottom-panel end-->
            </div>
            <!--content end-->
            <!-- project details -->
            <div class="det-overlay act-closedet"></div>
            <div class="fix-pr-det hid-det hid-det-anim">
                <div class="act-closedet closedet_style det-anim"><i class="fal fa-long-arrow-left"></i></div>
                <div class="pr-det-container initscroll">
                    <div class="fl-wrap det-anim">
                        <h2><?php echo $posts->products_judul ?></h2>
                        <span class="separator sep-b"></span>
                        <div class="clearfix"></div>
                        <p><?php echo $posts->products_desk ?></p>
                      </div>
                    <div class="caption-wrap fl-wrap det-anim">
                        <ul>
                            <li>
                                <span>Tahun</span>
                                <a href="#"><?php echo $posts->products_tahun ?></a>
                            </li>
                            <?php $cat = $this->Crud_m->view_join_where_array('products_category','products','products_cat_id',array ('products.products_cat_id' => $posts->products_cat_id))->row_array(); ?>
                            <li>
                                <span>Kategori</span>
                                <a href="#"><?php echo $cat['products_cat_judul']?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- <a href="#" class="btn fl-btn det-anim" target="_blank">View Project</a>
                    <div class="content-nav det-anim">
                        <ul>
                            <li><a href="#" class="ajax ln"><i class="fal fa-angle-left"></i><span class="tooltip">Prev - Project Title</span></a></li>
                            <li><a href="#" class="ajax rn"><i class="fal fa-angle-right"></i><span class="tooltip">Next - Project Title</span></a></li>
                        </ul>
                    </div>  -->

                </div>
            </div>
            <!-- project details  end-->
            <!--thumbnail-container-->
            <div class="thumbnail-container">
                <div class="thumbnail-wrap fl-wrap">
                </div>
            </div>
            <!--thumbnail-container end-->
            <!--share-wrapper-->
            <div class="share-wrapper">
                <div class="share-container fl-wrap  isShare"></div>
            </div>
            <!--share-wrapper end-->
        </div>
        <!-- wrapper end -->
        <!-- sidebar -->
        <div class="sb-overlay"></div>
        <div class="hiiden-sidebar-wrap outsb">
            <!-- sb-widget-wrap-->
            <div class="sb-widget-wrap fl-wrap">
                <h3>Office & Workshop</h3>
                <div class="sb-widget  fl-wrap">
                    <p>Office : Jl. Kelapa puyuh raya blok KE No.19, Kelapa Gading, Jakarta Utara</p>
                    <p>Workshop & Office : Jl. Caringin No. 235 Bandung, Jawa Barat</p>
                    <p>Workshop & Office : Jl. Dewi Sri No. 19 Renon Denpasar, Bali</p>
                    <p>Workshop & Office : Jl. Pahlawan Ende No. 257, Labuan Baju, NTT</p>
                </div>
            </div>
            <!-- sb-widget-wrap end-->
            <!-- sb-widget-wrap-->
            <div class="sb-widget-wrap fl-wrap">
                <h3>We're Are Social</h3>
                <div class="sb-widget    fl-wrap">
                    <div class="sidebar-social fl-wrap">
                        <ul>
                            <li><a href="<?php echo $identitas->facebook?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="<?php echo $identitas->instagram?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="<?php echo $identitas->youtube?>" target="_blank"><i class="fab fa-youtube"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- sidebar end -->
        <!-- cursor-->
        <div class="element">
            <div class="element-item"></div>
        </div>
        <!-- cursor end-->
    </div>
      <?php $this->load->view('frontend/js')?>
</body>
</html>
