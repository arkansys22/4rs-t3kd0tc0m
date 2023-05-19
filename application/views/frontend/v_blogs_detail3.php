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
  <div class="page-wrapper">
      <div class="preloader"></div>
    <?php $this->load->view('frontend/menu2')?>
    <?php $this->load->view('frontend/side_bar')?>
    <div class="sidebar-page-container">
    	<div class="container">
        	<div class="row clearfix">

				<!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                	<div class="blog-single">
						<div class="inner-box">
							<div class="image">
                <img <?php
                  if(empty($posts->blogs_gambar)) {echo "<img src='".base_url()."bahan/foto_blogs/layout_foto_default.png'>";}
                  else { echo " <img src='".base_url()."bahan/foto_blogs/".$posts->blogs_gambar."'> ";}
                  ?>
							</div>
							<div class="lower-content">
								<ul class="post-meta">
                  <?php if(empty($posts->blogs_update_oleh)){
                    echo"<li><span class='fa fa-user'></span>by ".$posts->blogs_post_oleh."</a><li><span class='fa fa-calendar'></span>".tgl_indo($posts->blogs_post_tanggal)."</li></li>";
                  }else{
                    echo"<li><span class='fa fa-user'></span>by ".$posts->blogs_update_oleh."</a><li><span class='fa fa-calendar'></span>".tgl_indo($posts->blogs_update_tanggal)."</li></li>";
                  } ?>
								</ul>
								<h4><?php echo $posts->blogs_judul?></h4>
								<div class="text">
                  <?php echo $posts->blogs_desk?>
									</div>

							</div>
						</div>

						<!--post-share-options-->
						<div class="post-share-options">
							<div class="post-share-inner clearfix">
              <ul class="pull-left social-links clearfix">
                  <span>Share Post: </span>
									<li class="facebook">
                    <a href="http://www.facebook.com/sharer.php?u=<?php echo base_url("$posts->blogs_judul_seo") ?>" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo base_url()?><?php echo $posts->blogs_judul_seo ?>','newwindow','width=400,height=350');  return false;" title="Facebook" target="_blank" title="Facebook" class="fa fa-facebook"></a>
                  </li>
									<li class="whatsapp">
                    <a href="whatsapp://send?text=<?php echo $posts->blogs_judul_seo ?> | <?php echo base_url("$posts->blogs_judul_seo") ?>" title="Whatsapp" target="_blank" class="fa fa-whatsapp"></a>
                  </li>									
								</ul>
							</div>
						</div>

						<!-- New Posts -->
						<div class="new-posts">
							<div class="clearfix">
								<a class="prev-post pull-left" href="#"><span class="fa fa-angle-double-left"></span> Previous Post</a>
								<a class="next-post pull-right" href="#">Next Post <span class="fa fa-angle-double-right"></span></a>
							</div>
						</div>

						<!--Comments Area-->
						<div class="comments-area">
							<div class="group-title">
								<h6>Comments</h6>
							</div>
							<!--Comment Box-->
							<div class="comment-box">
								<div class="comment">
									<div class="author-thumb"><img src="images/resource/author-7.jpg" alt=""></div>
									<div class="comment-inner clearfix">
										<div class="comment-info clearfix"><strong>Riva Collins</strong><div class="comment-time"> November 19, 2019 at 11:00 am </div></div>
										<div class="text">It’s no secret that the digital industry is booming. From exciting startups to need ghor global and brands, companies are reaching out.</div>
										<a class="comment-reply" href="#">Reply <span class="fa fa-angle-right"></span></a>
									</div>
								</div>
							</div>

							<!--Comment Box-->
							<div class="comment-box">
								<div class="comment">
									<div class="author-thumb"><img src="images/resource/author-8.jpg" alt=""></div>
									<div class="comment-inner clearfix">
										<div class="comment-info clearfix"><strong>Obila Doe</strong><div class="comment-time"> November 22, 2019 at 10:00 pm </div></div>
										<div class="text">It’s no secret that the digital industry is booming. From exciting startups to need ghor hmiu global and brands, companies are reaching out.</div>
										<a class="comment-reply" href="#">Reply <span class="fa fa-angle-right"></span></a>
									</div>
								</div>
							</div>

						</div>
						<!--End Comments Area-->

						<!-- Comment Form -->
						<div class="comment-form">
							<div class="group-title">
								<h6>Post A Comment</h6>
								<div class="group-text">Your email address will not be published *</div>
							</div>
							<!--Comment Form-->
							<form method="post" action="http://themexriver.com/tfhtml/lasight/blog.html">
								<div class="row clearfix">

									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<textarea name="message" placeholder="your comment"></textarea>
									</div>

									<div class="col-lg-4 col-md-4 col-sm-4 form-group">
										<input type="text" name="username" placeholder="name*" required>
									</div>

									<div class="col-lg-4 col-md-4 col-sm-4 form-group">
										<input type="email" name="email" placeholder="email*" required>
									</div>

									<div class="col-lg-4 col-md-4 col-sm-4 form-group">
										<input type="text" name="text" placeholder="website*" required>
									</div>

									<div class="col-lg-4 col-md-4 col-sm-12 form-group">
										<button class="theme-btn btn-style-one" type="submit" name="submit-form">Post Comment</button>
									</div>

								</div>
							</form>

						</div>
						<!--End Comment Form -->

					</div>
				</div>

				<!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar default-sidebar">

						<!-- Search -->
                        <div class="sidebar-widget search-box">
                        	<form method="post" action="http://themexriver.com/tfhtml/lasight/contact.html">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Enter Your Keyword..." required>
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
						</div>

						<!--Blog Category Widget-->
                        <div class="sidebar-widget sidebar-blog-category">
                            <div class="sidebar-title-two">
                                <h4>Categories</h4>
                            </div>
                            <ul class="blog-cat-two">
                                <li><a href="#">Consulting <span>(3)</span></a></li>
                                <li><a href="#">Technology <span>(4)</span></a></li>
                                <li><a href="#">Life style <span>(8)</span></a></li>
                            </ul>
                        </div>

						<!-- Popular Post Widget-->
                        <div class="sidebar-widget popular-posts">
                            <div class="sidebar-title-two">
                                <h4>Recent News</h4>
                            </div>

							<article class="post">
								<figure class="post-thumb"><img src="images/resource/post-thumb-1.jpg" alt=""><a href="blog-single.html" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
								<div class="text"><a href="blog-single.html">Business structured nontp frank team</a></div>
								<div class="post-info">July 25, 2019</div>
							</article>

							<article class="post">
								<figure class="post-thumb"><img src="images/resource/post-thumb-2.jpg" alt=""><a href="blog-single.html" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
								<div class="text"><a href="blog-single.html">Meetups and parties at night for every...</a></div>
								<div class="post-info">July 26, 2019</div>
							</article>

							<article class="post">
								<figure class="post-thumb"><img src="images/resource/post-thumb-3.jpg" alt=""><a href="blog-single.html" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
								<div class="text"><a href="blog-single.html">Always found him speakingas many...</a></div>
								<div class="post-info">July 25, 2019</div>
							</article>

						</div>

						<!--Archive Widget-->
                        <div class="sidebar-widget sidebar-blog-category archive-widget">
                            <div class="sidebar-title-two">
                                <h4>Archives</h4>
                            </div>
                            <ul class="blog-cat-two">
                                <li><a href="#">January 2019 <span>(3)</span></a></li>
                                <li><a href="#">February 2019 <span>(2)</span></a></li>
                                <li><a href="#">May 2019 <span>(6)</span></a></li>
                            </ul>
                        </div>

						<!--Gallery Widget-->
                        <div class="sidebar-widget instagram-widget">
                            <div class="sidebar-title-two">
                                <h4>Gallery</h4>
                            </div>
							<div class="images-outer clearfix">
                                <!--Image Box-->
                                <figure class="image-box"><a href="images/gallery/1.jpg" class="lightbox-image" data-caption="" data-fancybox="images" title="Image Title Here" data-fancybox-group="footer-gallery"><span class="overlay-box flaticon-plus"></span></a>
                                <img src="images/gallery/instagram-1.jpg" alt=""></figure>
                                <!--Image Box-->
                                <figure class="image-box"><a href="images/gallery/2.jpg" class="lightbox-image" data-caption="" data-fancybox="images" title="Image Title Here" data-fancybox-group="footer-gallery"><span class="overlay-box flaticon-plus"></span></a>
                                <img src="images/gallery/instagram-2.jpg" alt=""></figure>
                                <!--Image Box-->
                                <figure class="image-box"><a href="images/gallery/3.jpg" class="lightbox-image" data-caption="" data-fancybox="images" title="Image Title Here" data-fancybox-group="footer-gallery"><span class="overlay-box flaticon-plus"></span></a>
                                <img src="images/gallery/instagram-3.jpg" alt=""></figure>
                                <!--Image Box-->
                                <figure class="image-box"><a href="images/gallery/4.jpg" class="lightbox-image" data-caption="" data-fancybox="images" title="Image Title Here" data-fancybox-group="footer-gallery"><span class="overlay-box flaticon-plus"></span></a>
                                <img src="images/gallery/instagram-4.jpg" alt=""></figure>
                                <!--Image Box-->
                                <figure class="image-box"><a href="images/gallery/1.jpg" class="lightbox-image" data-caption="" data-fancybox="images" title="Image Title Here" data-fancybox-group="footer-gallery"><span class="overlay-box flaticon-plus"></span></a>
                                <img src="images/gallery/instagram-5.jpg" alt=""></figure>
                                <!--Image Box-->
                                <figure class="image-box"><a href="images/gallery/2.jpg" class="lightbox-image" data-caption="" data-fancybox="images" title="Image Title Here" data-fancybox-group="footer-gallery"><span class="overlay-box flaticon-plus"></span></a>
                                <img src="images/gallery/instagram-6.jpg" alt=""></figure>
                            </div>
						</div>

						<!-- Tags Widget-->
                        <div class="sidebar-widget popular-tags">
                            <div class="sidebar-title-two">
                                <h4>Tags</h4>
                            </div>
							<a href="#">Apps</a>
							<a href="#">Cloud</a>
							<a href="#">Life style</a>
							<a href="#">Hosting</a>
							<a href="#">Business</a>
						</div>

					</aside>
				</div>

			</div>
		</div>
	</div>

    <section class="blog-page-section">
  		<div class="container">
  			<div class="row clearfix">
          <?php  foreach ($posts as $post_new){
                       $isi = character_limiter($post_new->blogs_desk,200);
                       ?>

  				<div class="news-block col-lg-4 col-md-6 col-sm-12">
  					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
  						<div class="image">
                <img <?php
                          if(empty($post_new->blogs_gambar)) {
                            echo "<img src='".base_url()."bahan/layout_foto_promo.png'>";
                          }else {
                            echo " <img src='".base_url()."bahan/foto_blogs/".$post_new->blogs_gambar."'> ";}
                          ?>
  							<div class="overlay-box">
  								<a href="<?php echo base_url("blogs/$post_new->blogs_judul_seo ") ?>" class="plus flaticon-plus"></a>
  							</div>
  						</div>
  						<div class="lower-content">
  							<ul class="post-meta">
                  <?php if(empty($post_new->blogs_update_oleh)){
                    echo"<li>By <span class='fa fa-user'></span>".$post_new->blogs_post_oleh."</a><li><span class='fa fa-calendar'></span>".tgl_indo($post_new->blogs_post_tanggal)."</li></li>";
                  }else{
                    echo"<li>By <span class='fa fa-user'></span>".$post_new->blogs_update_oleh."</a><li><span class='fa fa-calendar'></span>".tgl_indo($post_new->blogs_update_tanggal)."</li></li>";
                  }
                   ?>
  							</ul>
  							<h5><a href="<?php echo base_url("blogs/$post_new->blogs_judul_seo ") ?>"><?php echo $post_new->blogs_judul?></a></h5>
  							<a href="<?php echo base_url("blogs/$post_new->blogs_judul_seo ") ?>" class="theme-btn btn-style-three">View more</a>
  						</div>
  					</div>
  				</div>


  				    <?php } ?>


  			</div>
  		</div>
  	</section>

    <!-- /Blog Area -->
    <?php $this->load->view('frontend/bottom')?>
    <?php $this->load->view('frontend/js')?>
</div>
</body>
</html>
