<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $posts->blogs_judul ?> - <?php echo $posts->blogs_keyword ?> | <?php echo $identitas->nama_website?></title>
  <meta name="title" content="<?php echo $posts->blogs_judul ?> - <?php echo $posts->blogs_keyword ?> | <?php echo $identitas->nama_website?>">
  <meta property="og:title" content="<?php echo $posts->blogs_judul ?> - <?php echo $posts->blogs_keyword ?> | <?php echo $identitas->nama_website?>">
  <meta NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
  <meta name="site_url" content="<?php echo base_url()?>blogs/<?php echo $posts->blogs_judul_seo ?>">
  <meta name="description" content="<?php echo $posts->blogs_meta_desk ?>">
  <meta name="keywords" content="<?php echo $posts->blogs_keyword ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="msvalidate.01" content="DA329AB9B967ABBCBD6B9280D0C3991A" />
  <meta name="web_author" content="arkansys.com">
  <link rel="alternate" href="<?php echo base_url()?>" hreflang="id" />
  <link href='<?php echo base_url()?>' rel='canonical'/>
  <meta property="og:site_name" content="<?php echo $identitas->nama_website?>">
  <meta property="og:description" content="<?php echo $posts->blogs_meta_desk ?>">
  <meta property="og:url" content="<?php echo base_url()?>product_detail/<?php echo $posts->blogs_judul_seo ?>">
  <meta property="og:image" content="<?php echo base_url()?>bahan/foto_products/<?php echo $posts->blogs_gambar ?>">
  <meta property="og:image:url" content="<?php echo base_url()?>bahan/foto_products/<?php echo $posts->blogs_gambar ?>">
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

    <section>
    	<div class="container">
        	<div class="row">
            	<div class="col-lg-9">
                	<div class="single_post">
                        <div class="blog_img">
                            <a href="#">
                                <img src="<?php echo base_url()?>bahan/foto_blogs/<?php echo $posts->blogs_gambar ?>" >
                            </a>
                        </div>
                        <div class="blog_content bg-white">
                            <div class="blog_text">
                                <h2><?php echo $posts->blogs_judul ?></h2>
                                <ul class="list_none blog_meta">
                                    <li><i class="ion-calendar"></i> <?php echo tgl_indo($posts->blogs_post_tanggal) ?></li>
                                    <li><?php echo $posts->blogs_dibaca ?> views</li>
                                </ul>
                                <p><?php echo $posts->blogs_desk ?></p>
                                	<div class="py-4 blog_post_footer">
                                    <div class="row justify-content-between align-items-center">
                                      <div class="col-md-4">
                                            <ul class="list_none social_icons border_social rounded_social">
                                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                                <li><a href="#"><i class="ion-social-whatsapp-outline"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="related_post border-top">
                    	<div class="comment-title mb-2 mb-sm-4">
                        	<h5>OTHER JOURNEY</h5>
                        </div>
                        <div class="row">
                            <?php $blogs = $this->Crud_m->view_where_orderings_limit('blogs',array('blogs_status'=>'publish'),'blogs_id','RANDOM','3','1'); ?>
                            <?php foreach ($blogs as $post_blog) {
                                $tgl_posting = $this->mylibrary->tgl_indo($post_blog->blogs_post_tanggal);
                              ?>
                              <div class="col-md-4 mb-md-4 mb-2 pb-2">
                                <div class="blog_post blog_style1">
                                    <div class="blog_img">
                                        <a href="<?php echo base_url() ?>blogs/<?php echo $post_blog->blogs_judul_seo?>">
                                          <?php if(empty($post_blog->blogs_gambar)) {
                                              echo "<img src='".base_url()."bahan/foto_products/noimage.jpg'>";
                                            }else {
                                              echo " <img src='".base_url('./bahan/foto_blogs/'.$post_blog->blogs_gambar)."'>

                                              ";}
                                           ?>
                                        </a>
                                    </div>
                                    <div class="blog_content bg-white">
                                        <div class="blog_text">
                                            <h6 class="blog_title"><a href="<?php echo base_url() ?>blogs/<?php echo $post_blog->blogs_judul_seo?>"><?php echo $post_blog->blogs_judul?></a></h6>
                                            <ul class="list_none blog_meta">
                                                <li><i class="ion-calendar"></i> <?php echo $tgl_posting?></li>
                                                <li> <?php echo $post_blog->blogs_dibaca?> views</li>
                                            </ul>
                                            <a href="<?php echo base_url() ?>blogs/<?php echo $post_blog->blogs_judul_seo?>" class="text-capitalize">Read More</a>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 mt-lg-0 mt-4 pt-3 pt-lg-0">
                	<div class="sidebar">
                    	<div class="widget">
                        	<h5 class="widget_title">FAVORITE TRANSPORT</h5>
                            <ul class="recent_post border_bottom_dash list_none">
                              <?php $services = $this->Crud_m->view_where_orderings_limit('services',array('services_status'=>'publish'),'services_dibaca','desc','3','1'); ?>
                              <?php foreach ($services as $post_services) {?>
                                <li>
                                    <div class="post_footer">
                                        <div class="post_img">
                                            <a href="<?php echo base_url() ?>services/<?php echo $post_services->services_judul_seo?>">
                                              <?php if(empty($post_services->services_gambar)) {
                                                  echo "<img src='".base_url()."bahan/foto_products/noimage.jpg'>";
                                                }else {
                                                  echo " <img src='".base_url('./bahan/foto_products/'.$post_services->services_gambar)."'>

                                                  ";}
                                               ?>
                                            </a>
                                        </div>
                                        <div class="post_content">
                                            <h6><a href="<?php echo base_url() ?>services/<?php echo $post_services->services_judul_seo?>"><?php echo $post_services->services_judul_konten?></a></h6>
                                        </div>
                                    </div>
                                </li>
                              <?php } ?>

                        	</ul>
                        </div>
                        <div class="widget">
                        	<h5 class="widget_title">CATEGORIES</h5>
                            <ul class="list_none widget_categories border_bottom_dash">
                              <?php $kategori_produk = $this->Crud_m->view_where_orderings('products_category',array('products_cat_status'=>'publish'),'products_cat_id','ASC'); ?>
                                  <?php foreach ($kategori_produk as $post) {  ?>
                                    <?php $count = $this->Panel_m->view_where('services',array('services_status'=>'publish','products_cat_id'=>$post->products_cat_id))->num_rows(); ?>
                                <li><a href="<?php echo base_url() ?>services"><span class="categories_name"><?php echo $post->products_cat_judul?></span><span class="categories_num">(<?php echo $count ?>)</span></a></li>
                              <?php } ?>
	                          </ul>
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
                                          	<a href="<?php echo base_url() ?>blogs/<?php echo $post_blog->blogs_judul_seo?>">
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
