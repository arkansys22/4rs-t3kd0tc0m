<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $identitas->nama_website?> - <?php echo $identitas->slogan?></title>
    <meta name="title" content="<?php echo $identitas->nama_website?> - <?php echo $identitas->slogan?>">
    <meta property="og:title" content="<?php echo $identitas->nama_website?> - <?php echo $identitas->slogan?>">
    <meta NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
    <meta name="site_url" content="<?php echo base_url()?>">
    <meta name="description" content="<?php echo $identitas->meta_deskripsi?>">
    <meta name="keywords" content="<?php echo $identitas->meta_keyword?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="msvalidate.01" content="DA329AB9B967ABBCBD6B9280D0C3991A" />
    <meta name="web_author" content="arsatek.com">
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

    <section id="home_section" class="bg_black3 banner_fs parallax_bg" data-parallax-bg-image="<?php echo base_url()?>bahan/frontend/image/bg-slider-web.jpg">
            <div class="container"><!-- STRART CONTAINER -->
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-last">
                        <div class="banner_inner">
                            <div class="tk_counter_inner text_white">
                                <h2 class="animation font-weight-bold" data-animation="fadeInUp" data-animation-delay="0.2s">Mulai Kesukseskan Usaha Dengan Optimalkan Strategi Online Terbaik</h2>
                                <br>
                                 <span class="tk_ending_txt animation" data-animation="fadeInUp" data-animation-delay="0.4s">Mayday Sale memberikan penawaran pembuatan website dan sosial media management ! Fitur lengkap, harga terjangkau, serta gratis domain & SSL. Dapatkan segera!        
                                </span>
                                 <br><br>
                                 <?php $besok = date('Y-m-d', strtotime("+1 day", strtotime(date("Y-m-d")))); ?>
                                <div class="countdown_time countdown_style1 countdown_white animation" data-animation="fadeInUp" data-animation-delay="0.2s" data-time="<?php echo $besok ?> 00:00:00"></div>
                               

                               
                                <br><br><br>
                                <a class="btn btn-default animation" data-animation="fadeInUp" data-animation-delay="0.9s" href="#harga">Lihat Penawaran</a>                       
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="d-block d-sm-none">
                        <img src="<?php echo base_url()?>bahan/frontend/image/woman-business.png" />
                    </div>
                    <div class="d-md-block d-none d-sm-block">
                        <img src="<?php echo base_url()?>bahan/frontend/image/woman-business.png"/>
                    </div>
                            
                         
                        
                    </div>
                </div>
            </div><!-- END CONTAINER-->
      
    </section>

    
    <section class="banner_section p-0">
        
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 text-center">
                    <div class="icon_box icon_box_style_9 animation" data-animation="fadeInUp" data-animation-delay="0.3s">
                        <div class="box_icon mb-3"> 
                            <img src="<?php echo base_url()?>bahan/frontend/image/garansi.png" />
                        </div>
                        <div class="icon_box_content">
                            <h5>PASTI BERGARANSI</h5>
                            <p>Pilihlah layanan Arsatek yang memberikan jaminan garansi, sehingga memberikan keamanan dan kepercayaan bagi Anda sebagai pelanggan atas kualitas layanan yang kami tawarkan</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 text-center">
                    <div class="icon_box icon_box_style_9 animation" data-animation="fadeInUp" data-animation-delay="0.4s">
                        <div class="box_icon mb-3"> 
                            <img src="<?php echo base_url()?>bahan/frontend/image/kualitas.png" />
                        </div>
                        <div class="icon_box_content">
                            <h5>PASTI BERKUALITAS</h5>
                            <p>Anda dapat memilih layanan kami dengan tenang, karena Arsatek menjamin kualitas layanan yang kami tawarkan sehingga memberikan kepercayaan dan peningkatan secara signifikan bagi Anda sebagai pelanggan
                                </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 text-center">
                    <div class="icon_box icon_box_style_9 animation" data-animation="fadeInUp" data-animation-delay="0.5s">
                        <div class="box_icon mb-3"> 
                            <img src="<?php echo base_url()?>bahan/frontend/image/murah.png" />
                        </div>
                        <div class="icon_box_content">
                            <h5>PASTI BERHEMAT</h5>
                            <p>Arsatek menawarkan layanan dengan harga terjangkau yang tidak mengurangi kualitas layanan yang kami berikan, sehingga Anda dapat memilih layanan dengan merasa puas dengan nilai yang Anda terima</p>
                        </div>
                     </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="mb-4 mb-lg-0 animation" data-animation="fadeInLeft" data-animation-delay="0.1s">
                        <img src="<?php echo base_url()?>bahan/frontend/image/home-kenapa.png" alt="aboutimg"/>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 animation" data-animation="fadeInUp" data-animation-delay="0.1s">
                    <div class="heading_s1">
                      <h5>Kenapa Memilih <?php echo $identitas->nama_website?></h5>
                        <h3>Alasan Arsatek Partner Bisnis Tepat untuk Anda</h3>
                    </div>
                    <p align="justify">
                    <div class="list_style_5 color_blue mb-3">
                        <ul>
                            <li>Pengerjaan Cepat</li>
                            <li>Harga Terjangkau</li>
                            <li>Gratis Email Bisnis Untuk Pembuatan Web</li>
                            <li>Gratis Hosting dan Domain Untuk Pembuatan Web</li>
                            <li>Tim Support 24/7</li>
                            <li>Bergaransi</li>
                        </ul>
                    </div>
                    
                    </p>
                    <!--
                    <p>
                      Temukan keseruan liburan anda di Komodo & Flores dengan armada yang nyaman dan Driver Handal dari Komodo Transport</p>
                      <p><b>Solusinya Armada Liburan Anda</b>
                    </p> -->
                    <a href="https://api.whatsapp.com/send/?phone=<?php echo $identitas->whatsapp ?>&text=Hallo+Arsatek.+Saya+tertarik+mengembangkan+bisnis+saya+dengan+website+dan+akun+sosial+media.Bisakah+Arsatek+membantu+bisnis+saya?" class="btn btn-outline-default">HUBUNGI KAMI SEKARANG</a>
                </div>
            </div>
        </div>
        <br><br>
        <div id="carouselExampleFade" class="carousel slide carousel-fade light_arrow2 slide_height_700" data-ride="carousel" data-pause="false">
            <div class="carousel-inner">
            <?php $slider = $this->Crud_m->view_where_orderings('workshop',array('workshop_status'=>'publish'),'workshop_id','DESC'); ?>
              <?php foreach ($slider as $post_slider) { ?>
                <?php if(empty($post_slider->workshop_gambar)) { ?>
                <div class="carousel-item background_bg active" data-img-src="<?php echo base_url()?>bahan/foto_products/noimage.jpg">     </div>
                <?php }else { ?>
                    <div class="carousel-item background_bg <?=$post_slider->workshop_position?>" data-img-src="<?php echo base_url()?>bahan/foto_workshop/<?=$post_slider->workshop_gambar?>">                    
                    </div>
                <?php }}?>


            </div>
        
        </div>        
    </section>
    <section class="bg_linen">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 animation" data-animation="fadeInUp" data-animation-delay="0.1s">
                    <div class="heading_s4 text-center">
                        <h3>Beberapa Contoh <b>Portfolio Arsatek</b></h3>
                    </div>
                    <p class="text-center">Dunia online didominasi oleh perusahaan besar dengan brand dan modal yang kuat. Agar dapat memperoleh keunggulan di dunia online, Arsatek mengutamakan desain profesional, kemudahan navigasi, kecepatan, dan tampilan responsif yang dapat memenangkan kepercayaan customer sejak pandangan pertama.</p>
                </div>
            </div>
            <div class="row">
            <?php $portfolio = $this->Crud_m->view_where_orderings('portfolio',array('portfolio_status'=>'publish'),'portfolio_id','DESC'); ?>
            <?php foreach ($portfolio as $post) {  ?>
                <div class="col-lg-4 col-sm-6 mb-md-4 mb-3 pb-2 text-center">
                    <div class="team_box team_box_style4 animation" data-animation="fadeInUp" data-animation-delay="0.2s">
                        <div class="team_img">
                            <img src="<?php echo base_url()?>bahan/foto_products/<?php echo $post->portfolio_gambar?>" alt="speaker">
                            <ul class="list_none social_icons hover_style2 social_horizontal social_white">
                                <li><a href="<?php echo $post->portfolio_url?>" target="_blank"><i class="fas fa-link"></i></a></li>
                            </ul><br>
                            <div class="team_title">
                                <h5><?php echo $post->portfolio_judul?></h5>
                                <?php $kategori= $this->Crud_m->view_where('portfolio_category', array('portfolio_cat_id_session'=> $post->portfolio_cat_id))->row_array(); ?>
                                <span><?php echo $kategori['portfolio_cat_judul']?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>                
            </div>
            <div class="row">   
                <div class="col-12 text-center animation mt-sm-3" data-animation="fadeInUp" data-animation-delay="0.2s">
                    <a href="#" class="btn btn-default btn-md btn-radius mb-2">Lihat Portfolio Lainnya</a>
                </div>
            </div>
        </div>
    </section>
    <section class="cta_section_small bg_blue px-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 text_white animation" data-animation="fadeInUp" data-animation-delay="0.5s">
                    <h2 class="">Hemat Waktu dan Uang Anda</h2>
                    <p class="mb-md-0">Website profesional dan akun media sosial adalah salah satu aset investasi untuk bisnis Anda. Percayakan pembuatan website profesional dan pengelolaan akun media sosial Anda kepada Arsatek untuk hasil yang terbaik.</p>
                </div>
                <div class="col-md-4 text-md-right animation" data-animation="fadeInUp" data-animation-delay="0.6s">    
                    <a href="https://api.whatsapp.com/send/?phone=<?php echo $identitas->whatsapp ?>&text=Hallo+Arsatek.+Saya+tertarik+mengembangkan+bisnis+saya+dengan+website+dan+akun+sosial+media.Bisakah+Arsatek+membantu+bisnis+saya?" class="btn btn-outline-white btn-radius mb-2">Konsultasi Sekarang</a>
                </div>
            </div>
        </div>
    </section>
    <section id="harga" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="heading_s3 text-center">
                        <h3>Pembuatan Website Dan Pengelola Media Sosial Terbaik di Indonesia</h3><br>
                        <span>Arsatek menyediakan layanan pembuatan website dan pengelola media sosial dengan kualitas terbaik dan harga terjangkau untuk meraih keberhasilan bisnis Anda secara online</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tab-style8 pt-2 text-center">
                        <ul class="nav nav-tabs sliding_tab animation" role="tablist" data-animation="fadeInUp" data-animation-delay="0.3s">
                        <?php $kategori_produk = $this->Crud_m->view_where_orderings('products_category',array('products_cat_status'=>'publish'),'products_cat_id','ASC'); ?>
                            <?php foreach ($kategori_produk as $post) {  ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($post->products_cat_id== "9"){echo "active";} else{echo"";}?>" data-toggle="tab" href="#<?php echo $post->products_cat_judul_seo?>" role="tab" aria-controls="<?php echo $post->products_cat_judul?>" aria-selected="true"><?php echo $post->products_cat_judul?></a>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="clearfix medium_divider"></div>
                    <div class="tab-content">
                        <?php foreach ($kategori_produk as $post) {  ?>
                         
                            <div class="tab-pane fade show <?php if($post->products_cat_id== "9"){echo "active";} else{echo"";}?>" id="<?php echo $post->products_cat_judul_seo?>" role="tabpanel">
                                <div class="row">
                                <?php $services = $this->Crud_m->view_where_orderings('services',array('services_status'=>'publish','products_cat_id'=>$post->products_cat_id_session),'services_id','ASC'); ?>
                                    <?php foreach ($services as $post_services) {  ?>
                                        <div class="col-md-3 mb-md-5 mb-4" >
                                            <div class="pricing_box pricing_style2 animation" data-animation="flipInY" data-animation-delay="0.2s">
                                            <?php if($post_services->services_harga_percent =='70') { ?>
                                                <div class="pricing_ribbon">Paling Laris</div>
                                                <?php }else{?>
                                                <?php }?>
                                                <div class="pr_title bg-white" style="text-align:left;">
                                                    <h4 ><?php echo $post_services->services_judul_konten?></h4>
                                                    <p><?php echo $post_services->services_meta_desk?></p>

                                                    <div class="price_tage">
                                                        <span>Diskon <?php echo $post_services->services_harga_percent?>% <del>Rp<?php echo number_format($post_services->services_harga,0,',','.')?></del></span> 

                                                        <?php $a = $post_services->services_harga - ($post_services->services_harga * ($post_services->services_harga_percent/100))?>
                                                        <h4>Rp<?php echo number_format($a,0,',','.') ?><span style="font-size:12px;">/ bulan</span></h4>
                                                    </div>
                                                    <div class="pr_footer text-center" >
                                                        <a href="https://api.whatsapp.com/send/?phone=<?php echo $identitas->whatsapp ?>&text=Hallo+Arsatek.+Saya+ingin+membuat+<?php echo $post_services->services_judul_konten?>+untuk+awal+bisnis+saya.+Bisa+bantu+saya+mewujudkannya?.." class="btn btn-outline-default btn-md btn-radius mb-2" >Pilih Paket Ini</a>
                                                    </div>
                                                </div>

                                                <div class="pr_content border-bottom" style="text-align:left;">                                      
                                                   <?php echo $post_services->services_desk?>
                                                </div>
                                                <div class="pr_footer" >
                                                    <a href="<?php echo base_url() ?>layanan/<?php echo $post_services->services_judul_seo?>" style="color:blue;">Lihat Fitur Lengkap</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                        
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="small_pt small_pb">
        <div class="container">
        <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="heading_s3 text-center">
                        <h3>Klien Setia Arsatek</h3><br>
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 animation" data-animation="fadeInDown" data-animation-delay="0.1s">
                    <div class="cl_logo_slider owl-carousel owl-theme" data-margin="30" data-loop="true" data-autoplay="true" data-dots="false" data-autoplay-timeout="2000">
                    <?php $testimonial = $this->Crud_m->view_where_orderings('testimonial',array('testimonial_status'=>'publish'),'testimonial_id','ASC'); ?>
                        <?php foreach ($testimonial as $post_testimonial) { ?>
                        <div class="item">
                            <a href="#">
                            <?php if(empty($post_testimonial->testimonial_gambar)) {
                                echo "<img src='".base_url()."bahan/foto_products/noimage.jpg'>";
                              }else {
                                echo " <img src='".base_url('./bahan/foto_testimonial/'.$post_testimonial->testimonial_gambar)."'>

                                ";}
                             ?>
                           </a>
                        </div>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 animation" data-animation="fadeInRight" data-animation-delay="0.2s">
                    <div class="heading_s3 text-center">
                        <h3>Pertanyaan yang sering ditanyakan</h3>
                    </div>
                    <div id="accordion" class="accordion accordion_style2">
                        <div class="card">
                          <div class="card-header" id="headingTwo">
                            <h5 class="mb-0"> <a class="" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Apa Keunggulan Arsatek</a> </h5>
                          </div>
                          <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body"> 
                            <p><h6>We Grow Up Your Personal Brand</h6>
                                Arsatek tidak hanya semata membuat website. Kami melakukan pemilihan font, warna, gambar dan segala jenis konten lainnya yang menunjang profesionalisme untuk menuangkan kekuatan brand yang Anda miliki. Dan kami juga membantu memperkuat personal brand di akun sosial media (Instagram & Tiktok)</p>
                                
                                <p><h6>Advertising Free</h6>
                                Anda tidak perlu khawatir website Anda dijadikan media promosi oleh Arsatek. Website Anda tidak perlu ditempeli kalimat “website by Arsatek”</p>

                                <p><h6>We Respect Our Customers</h6>
                                Arsatek tidak akan melakukan perubahan apapun tanpa seijin Anda. Kami juga tidak menjual / membocorkan data pelanggan kami</p>

                                <p><h6>Customer Service Support</h6>
                                Tidak ada yang lebih menyebalkan dibandingkan saat web developer yang kita harap bisa diandalkan secara tiba-tiba menghilang. Anda tidak perlu mengkhawatirkan hal ini terjadi apabila memilih Arsatek sebagai partner bisnis Anda. Kami akan selalu menyediakan support penuh untuk pelanggan kami</p>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingOne">
                            <h5 class="mb-0"> <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="collapsed">Apa Keuntungan Bisnis Harus Memiliki Website</a> </h5>
                          </div>
                          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body"><p>Website memiliki banyak manfaat dan keuntungan yang dapat membantu bisnis atau organisasi Anda tumbuh dan berkembang. Berikut beberapa alasan mengapa Anda harus mempertimbangkan memiliki website:</p>
                            <div class="list_style_5 color_blue mb-3">
                            <ul>
                            <li>Memperluas jangkauan pasar: Dengan memiliki website, bisnis atau organisasi Anda dapat menjangkau pelanggan potensial di seluruh dunia, bahkan pada waktu yang berbeda.</li>

                            <li>Meningkatkan kredibilitas: Website dapat meningkatkan kredibilitas bisnis atau organisasi Anda di mata pelanggan. Dengan memiliki website, Anda dapat menunjukkan bahwa bisnis atau organisasi Anda serius dan profesional dalam menjalankan usahanya.</li>

                            <li>Meningkatkan branding: Website juga dapat membantu meningkatkan branding bisnis atau organisasi Anda. Dengan desain website yang menarik dan representatif, pelanggan dapat mengingat merek atau logo bisnis atau organisasi Anda.</li>

                            <li>Memberikan informasi lengkap: Website dapat memberikan informasi lengkap mengenai produk atau layanan yang ditawarkan, kebijakan, visi dan misi, serta profil bisnis atau organisasi Anda. Hal ini dapat membantu pelanggan memahami bisnis atau organisasi Anda dengan lebih baik.</li>

                            <li>Meningkatkan penjualan: Website dapat meningkatkan penjualan bisnis atau organisasi Anda dengan memberikan kemudahan bagi pelanggan untuk melakukan transaksi atau pembelian secara online.</li>

                            <li>Menghemat biaya: Dengan memiliki website, Anda dapat menghemat biaya pemasaran dan promosi karena dapat memanfaatkan website sebagai media promosi dan pemasaran yang efektif dan efisien.</li>
                            </ul>
                            </div>

                            <p>Dengan banyaknya manfaat dan keuntungan yang ditawarkan, memiliki website dapat menjadi strategi bisnis yang cerdas dan membantu bisnis atau organisasi Anda tumbuh dan berkembang.</p></div>
                          </div>
                        </div>                        
                        <div class="card">
                          <div class="card-header" id="headingThree">
                            <h5 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Apakah sewaktu-waktu saya bisa mengupdate fitur atau konten website?</a> </h5>
                          </div>
                          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body"> Ya, Anda dapat menghubungi kami dan menjelaskan perubahan/penambahan yang Anda inginkan</div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingFour">
                            <h5 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Apakah ada jaminan jika website yang saya peroleh tidak sesuai dengan yang direncanakan?</a> </h5>
                          </div>
                          <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body"> Arsatek menyediakan garansi 100% uang kembali apabila produk kami tidak dapat memenuhi keinginan Anda. Kami memberikan batas 7 hari, terhitung sejak website selesai dibuat</div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingFive">
                            <h5 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Mendadak Fitur pada website saya tidak berfungsi! Apa yang perlu saya lakukan?</a> </h5>
                          </div>
                          <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                            <div class="card-body"> Anda tidak perlu khawatir, Anda cukup menghubungi kami dan ceritakan kendala yang Anda alami. Arsatek akan memberikan solusinya secepat mungkin</div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingSix">
                            <h5 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Bagaimana cara pembayaran Arsatek?</a> </h5>
                          </div>
                          <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                            <div class="card-body"> Pembayaran dilakukan dengan sistem transfer bank yang akan kami informasikan setelah Anda menyetujui proyek untuk dikerjakan. Pembayaran dilakukan secara 2 tahap. Tahap pertama sebesar 50% sebagai tanda jadi dan tahap kedua sisanya setelah website selesai dikerjakan</div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingSeven">
                            <h5 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">Bagaimana pembayaran untuk tahun berikutnya?</a> </h5>
                          </div>
                          <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
                            <div class="card-body"> Arsatek akan mengingatkan Anda jatuh tempo untuk perpanjangan per tahun dan memberikan petunjuk pembayarannya</div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingEight">
                            <h5 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">Berapa lama waktu pembuatan website?</a> </h5>
                          </div>
                          <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
                            <div class="card-body"> Waktu pembuatan website sangat dipengaruhi oleh tingkat kesulitan dan banyaknya fitur yang diinginkan. Kami akan memberikan Anda estimasi waktu pengerjaan setelah Anda menjelaskan kebutuhan Anda</div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingNine">
                            <h5 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">Apakah Arsatek merupakan perusahaan atau freelance?</a> </h5>
                          </div>
                          <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion">
                            <div class="card-body"> Arsatek merupakan perusahaan berbadan hukum dengan nama <b>PT Nadi Sukses Berkarya</b></div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingTen">
                            <h5 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">Saya tertarik dan ingin segera membuat website. Bagaimana caranya?</a> </h5>
                          </div>
                          <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion">
                            <div class="card-body"> Anda bisa segera menghubungi tim Arsatek. Kami akan siap membantu Anda</div>
                          </div>
                        </div>
                  </div>
                </div>
               
            </div>
        </div>
    </section>
    <section class="cta_section_small bg_blue px-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 text_white animation" data-animation="fadeInUp" data-animation-delay="0.1s">
                    <h2 class="">Tim Arsatek Siap Membantu Anda</h2>
                    <p class="mb-md-0">Kami mengerti membuat website bukanlah keputusan mudah. Oleh karena itu, kami siap membantu Anda untuk menemukan pilihan terbaik yang sesuai dengan budget dan tujuan Anda. Hubungi kami untuk berkonsultasi.</p>
                    <br>
                        <a href="https://api.whatsapp.com/send/?phone=<?php echo $identitas->whatsapp ?>&text=Hallo+Arsatek.+Saya+tertarik+mengembangkan+bisnis+saya+dengan+website+dan+akun+sosial+media.Bisakah+Arsatek+membantu+bisnis+saya?" class="btn btn-outline-white btn-radius mb-2">Konsultasi Sekarang</a>                
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
