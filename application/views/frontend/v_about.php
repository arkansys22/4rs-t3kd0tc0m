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
  <div class="loader-wrap">
      <div class="spinner">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
      </div>
  </div>
  <div id="main">
    <?php $this->load->view('frontend/menu')?>
    <div id="wrapper">
        <!-- content -->
        <div class="content">
            <!-- column-image  -->
            <div class="column-image">
                <div class="bg" data-bg="<?php echo base_url()?>bahan/frontend/images/bg/19.jpg"></div>
                <div class="overlay"></div>
                <div class="column-title">
                    <h2>About Me</h2>
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</h3>
                </div>
                <div class="column-notifer">
                    <div class="scroll-down-wrap transparent_sdw">
                        <div class="mousey">
                            <div class="scroller"></div>
                        </div>
                        <span>Scroll down  to Discover</span>
                    </div>
                </div>
                <div class="fixed-column-dec"></div>
            </div>
            <!-- column-image end  -->
            <!-- column-wrapper -->
            <div class="column-wrapper">
                <div class="scroll-nav-wrap">
                    <nav class="scroll-nav scroll-init">
                        <ul>
                            <li><a class="act-scrlink" href="#sec1">About</a></li>
                            <li><a href="#sec2">Skills</a></li>
                            <li><a href="#sec3">Services</a></li>
                            <li><a href="#sec4">Clients</a></li>
                        </ul>
                    </nav>
                </div>
                <!--section  -->
                <section id="sec1">
                    <div class="container small-container">
                        <div class="section-title fl-wrap">
                            <h3>My Little Story</h3>
                            <h4>Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa</h4>
                            <div class="section-number">01.</div>
                        </div>
                        <div class="column-wrapper_item fl-wrap">
                            <div class="column-wrapper_text fl-wrap">
                                <p>Cras mattis iudicium purus sit amet fermentum at nos hinc posthac, sitientis piros afros. Lorem ipsum dolor sit amet, consectetur adipisici elit, petierunt uti sibi concilium totius Galliae in diem sed eius mod tempor incidunt ut labore et dolore magna aliqua. Pellentesque habitant morbi tristique senectus et netus piros labore et dolore magna.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.
                                </p>
                                <p>Praesent nec leo venenatis elit semper aliquet id ac enim. Maecenas nec mi leo. Etiam venenatis ut dui non hendrerit. Integer dictum, diam vitae blandit accumsan, dolor odio tempus arcu, vel ultrices nisi nibh vitae ligula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi varius lacinia vestibulum. Aliquam lobortis facilisis tellus, in facilisis ex vehicula ac. In malesuada quis turpis vel viverra.</p>
                                <div class="inline-facts-holder fl-wrap">
                                    <!-- inline-facts -->
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="461" data-num="461">461</div>
                                            </div>
                                        </div>
                                        <h6>Finished projects</h6>
                                    </div>
                                    <!-- inline-facts end -->
                                    <!-- inline-facts  -->
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="461" data-num="461">461</div>
                                            </div>
                                        </div>
                                        <h6>Finished projects</h6>
                                    </div>
                                    <!-- inline-facts end -->
                                    <!-- inline-facts  -->
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="168" data-num="168">168</div>
                                            </div>
                                        </div>
                                        <h6>Happy customers</h6>
                                    </div>
                                    <!-- inline-facts end -->
                                    <!-- inline-facts  -->
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="222" data-num="222">222</div>
                                            </div>
                                        </div>
                                        <h6>Working hours </h6>
                                    </div>
                                    <!-- inline-facts end -->
                                </div>
                                <a href="portfolio.html" class="btn fl-btn">My Portfolio</a>
                            </div>
                        </div>
                    </div>
                </section>
                <!--section end  -->
                <div class="sec-dec"></div>
                <!--section   -->
                <section id="sec2">
                    <div class="container small-container">
                        <div class="section-title fl-wrap">
                            <h3>Skills and Attainments</h3>
                            <h4>Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa</h4>
                            <div class="section-number">02.</div>
                        </div>
                        <div class="column-wrapper_item fl-wrap">
                            <div class="column-wrapper_text fl-wrap">
                                <div class="skillbar-box animaper">
                                    <!-- skill 1-->
                                    <div class="custom-skillbar-title"><span>Photoshop</span></div>
                                    <div class="skill-bar-percent">95%</div>
                                    <div class="skillbar-bg" data-percent="95%">
                                        <div class="custom-skillbar"></div>
                                    </div>
                                    <!-- skill 2-->
                                    <div class="custom-skillbar-title"><span>Illustrator</span></div>
                                    <div class="skill-bar-percent">65%</div>
                                    <div class="skillbar-bg" data-percent="65%">
                                        <div class="custom-skillbar"></div>
                                    </div>
                                    <!-- skill 3-->
                                    <div class="custom-skillbar-title"><span>3D MAX</span></div>
                                    <div class="skill-bar-percent">75%</div>
                                    <div class="skillbar-bg" data-percent="75%">
                                        <div class="custom-skillbar"></div>
                                    </div>
                                    <!-- skill 4-->
                                    <div class="custom-skillbar-title"><span>Google ScketchUp</span></div>
                                    <div class="skill-bar-percent">90%</div>
                                    <div class="skillbar-bg" data-percent="90%">
                                        <div class="custom-skillbar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--section end  -->
                <div class="sec-dec"></div>
                <!--section   -->
                <section id="sec3">
                    <div class="container small-container">
                        <div class="section-title fl-wrap">
                            <h3>Services and prices</h3>
                            <h4>Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa</h4>
                            <div class="section-number">03.</div>
                        </div>
                        <div class="column-wrapper_item fl-wrap">
                            <div class="column-wrapper_text fl-wrap">
                                <!-- serv-wrap-->
                                <div class="serv-wrap fl-wrap">
                                    <!-- serv-item -->
                                    <div class="serv-item">
                                        <div class="serv-media">
                                            <img src="<?php echo base_url()?>bahan/frontend/images/services/1.jpg" alt="">
                                        </div>
                                        <div class="serv-text">
                                            <h4><a href="#">Wedding Photography</a></h4>
                                            <p> Sed blandit, dolor id aliquam vestibulum, nibh elit imperdiet turpis, quis molestie quam erat vel nisi.</p>
                                            <ul>
                                                <li><a href="#">Portraits</a></li>
                                                <li><a href="#">Weddings</a></li>
                                                <li><a href="#">Commercials</a></li>
                                            </ul>
                                            <div class="serv-price">Price :<span> $250-$1200</span></div>
                                        </div>
                                    </div>
                                    <!-- serv-item end -->
                                    <!-- serv-item -->
                                    <div class="serv-item">
                                        <div class="serv-media">
                                            <img src="<?php echo base_url()?>bahan/frontend/images/services/2.jpg" alt="">
                                        </div>
                                        <div class="serv-text">
                                            <h4><a href="#">Commercial Photography</a></h4>
                                            <p> Sed blandit, dolor id aliquam vestibulum, nibh elit imperdiet turpis, quis molestie quam erat vel nisi.</p>
                                            <ul>
                                                <li><a href="#">Filming</a></li>
                                                <li><a href="#">Montage</a></li>
                                                <li><a href="#">Slow motion</a></li>
                                            </ul>
                                            <div class="serv-price">Price :<span> $350-$900</span></div>
                                        </div>
                                    </div>
                                    <!-- serv-item end -->
                                </div>
                                <!-- serv-wrap end -->
                                <p>Praesent nec leo venenatis elit semper aliquet id ac enim. Maecenas nec mi leo. Etiam venenatis ut dui non hendrerit. Integer dictum, diam vitae blandit accumsan, dolor odio tempus arcu, vel ultrices nisi nibh vitae ligula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi varius lacinia vestibulum. Aliquam lobortis facilisis tellus, in facilisis ex vehicula ac. In malesuada quis turpis vel viverra.</p>
                            </div>
                        </div>
                    </div>
                </section>
                <!--section end  -->
                <div class="sec-dec"></div>
                <!--section -->
                <section id="sec4">
                    <div class="container small-container">
                        <div class="section-title fl-wrap">
                            <h3>Clients and Testimonilas</h3>
                            <h4>Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa</h4>
                            <div class="section-number">04.</div>
                        </div>
                        <div class="column-wrapper_item fl-wrap">
                            <div class="column-wrapper_text fl-wrap">
                                <div class="testilider fl-wrap" data-effects="slide">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <!-- swiper-slide -->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="<?php echo base_url()?>bahan/frontend/images/avatar/1.jpg" alt=""></div>
                                                    <h3>Liza Mirovsky</h3>
                                                    <p>"All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over "</p>
                                                    <a href="#" class="teti-link" target="_blank">Via Twitter</a>
                                                </div>
                                            </div>
                                            <!-- swiper-slide end-->
                                            <!-- swiper-slide -->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="<?php echo base_url()?>bahan/frontend/images/avatar/2.jpg" alt=""></div>
                                                    <h3>Andy Smith</h3>
                                                    <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                                    <a href="#" class="teti-link" target="_blank">Via Facebook</a>
                                                </div>
                                            </div>
                                            <!-- swiper-slide end-->
                                            <!-- swiper-slide -->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="<?php echo base_url()?>bahan/frontend/images/avatar/3.jpg" alt=""></div>
                                                    <h3>Gary Trust</h3>
                                                    <p>"All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over "</p>
                                                    <a href="#" class="teti-link" target="_blank">Via Myspace</a>
                                                </div>
                                            </div>
                                            <!-- swiper-slide end-->
                                            <!-- swiper-slide -->
                                            <div class="swiper-slide">
                                                <div class="testi-item fl-wrap">
                                                    <div class="testi-avatar"><img src="<?php echo base_url()?>bahan/frontend/images/avatar/4.jpg" alt=""></div>
                                                    <h3>Centa Simpson</h3>
                                                    <p>"Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. "</p>
                                                    <a href="#" class="teti-link" target="_blank">Via Facebook</a>
                                                </div>
                                            </div>
                                            <!-- swiper-slide end-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testilider-controls">
                                <div class="ss-slider-btn ss-slider-prev color-bg"><i class="fal fa-angle-left"></i></div>
                                <div class="ss-slider-btn ss-slider-next color-bg"><i class="fal fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--section end  -->
                <!--footer -->
                <footer class="min-footer fl-wrap content-animvisible">
                    <div class="container small-container">
                        <div class="footer-inner fl-wrap">
                            <!-- policy-box-->
                            <div class="policy-box">
                                <span>&#169; Kotlis 2019  /  All rights reserved. </span>
                            </div>
                            <!-- policy-box end-->
                            <a href="#" class="to-top-btn to-top">Back to top <i class="fal fa-long-arrow-up"></i></a>
                        </div>
                    </div>
                </footer>
                <!--footer end  -->
            </div>
            <!-- column-wrapper -->
        </div>
        <!--content end-->
        <!--share-wrapper-->
        <div class="share-wrapper">
            <div class="share-container fl-wrap  isShare"></div>
        </div>
        <!--share-wrapper end-->
    </div>
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
    <div class="element">
        <div class="element-item"></div>
    </div>
  </div>

<?php $this->load->view('frontend/js')?>
</div>
</body>
</html>
