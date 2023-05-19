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
          <div class="content">
              <!-- bottom-filter-wrap -->
              <div class="bottom-filter-wrap hor-filter-wrap">
                  <div class="scroll-down-wrap">
                      <div class="mousey">
                          <div class="scroller"></div>
                      </div>
                      <span>Scroll down to discover</span>
                  </div>

              </div>
              <!-- bottom-filter-wrap end -->
              <div class="ff_panel-conainer fl-wrap">
                  <!-- portfolio start -->
                  <div class="gallery-items big-padding   four-column fl-wrap vis-thumb-info lightgallery">
                      <!-- gallery-item-->
                      <?php foreach ($posts as $post) {  ?>
                      <div class="gallery-item nature">
                          <div class="grid-item-holder hov_zoom">
                            <?php if(empty($post->equipment_gambar)) {
                                echo "<img src='".base_url()."bahan/foto_products/noimage.jpg'>";
                              }else {
                                echo " <img src='".base_url('./bahan/foto_equipment/'.$post->equipment_gambar)."'>
                                        <a href='".base_url('./bahan/foto_equipment/'.$post->equipment_gambar)."' class='box-media-zoom   popup-image'><i class='fal fa-search'></i></a>
                                ";}
                             ?>
                              <div class="thumb-info">
                                  <h3><a href="<?php echo base_url() ?>equipment/<?php echo $post->equipment_judul_seo?>"><?php echo $post->equipment_judul?></a></h3>
                                  <p><?php echo $post->equipment_desk?></p>
                              </div>
                          </div>
                      </div>
                    <?php } ?>

                  </div>
                  <!-- portfolio end -->
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
