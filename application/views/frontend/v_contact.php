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


<body class="has-spotlight ashade-smooth-scroll no-top-padding">
    <?php $this->load->view('frontend/menu')?>
    <div class="ashade-page-title-wrap">
        <h1 class="ashade-page-title">
            <span>Who we are?</span>
            About us
        </h1>
    </div>

    <main class="ashade-content-wrap">
    <div class="ashade-content-scroll">
      <div class="ashade-content">
        <!-- About Section for Desktop Layout Only -->
        <section class="ashade-section">
            <div class="ashade-col col-8">
              <h2>
                <span>Few Words About Logaya Studio</span>
                NICE TO MEET YOU !
              </h2>
                <p>We are the production house of Logaya Studio from Indonesia. We have done a great job including pre-wedding documentation, engagement, wedding events and digital content marketing.</p>
                <p>We focus on producing the best work with reliable and professional photography, videography and editing skills. Through lenses and other supporting tools, we want to show you these differences.</p>
            </div>
       
        </section>
        <section class="ashade-section">
                        <div class="ashade-col col-8">
                          <h3>
                            <span>How does this happen</span>
                            Photo Processing
                          </h3>
                            <p>Here we like to show you photo processing. Sometimes you can not see result without direct comparsion. So we'll show you direct compare photo before and after processing, where we made retouching photo, removed background noise and improve color brightness.</p>
                            <br>
                        </div><!-- .ashade-col -->
            
          <div class="ashade-row">
                        <div class="ashade-col col-12">
                          <div class="ashade-before-after" data-img-before="<?php echo base_url()?>bahan/frontend/img/about/before.jpg" data-img-after="<?php echo base_url()?>bahan/frontend/img/about/after.jpg">
                            <img src="<?php echo base_url()?>bahan/frontend/img/about/before.jpg" alt="Photo Processing" width="1920" height="1280">
                          </div><!-- .ashade-before-after -->
                        </div><!-- .ashade-col -->
                    </div><!-- .ashade-row -->
        </section>
      </div><!-- .ashade-content -->
      <div class="ashade-content">			
				<section class="ashade-section">
					<div class="ashade-row">
						<div class="ashade-col col-4">
							<div class="ashade-contact-details">
								<h4 class="ashade-contact-details__title">
                  <span>Contacts and Socials</span>
                  How to Find Us
								</h4>
                <ul class="ashade-contact-details__list">
                  <li>
                    <i class="ashade-contact-icon la la-map-marker"></i>
                      <?php echo $identitas->alamat?>
                  </li>
                  <li>
                    <i class="ashade-contact-icon la la-phone"></i>
                    <a href="tel:+<?php echo $identitas->no_telp?>"><?php echo $identitas->no_telp?></a>
                  </li>
                  <li>
                    <i class="ashade-contact-icon la la-envelope"></i>
                    <a href="mailto:<?php echo $identitas->email?>"><?php echo $identitas->email?></a>
                  </li>
                  <li class="ashade-contact-socials">
                    <i class="ashade-contact-icon la la-share-alt"></i>
                    <a href="<?php echo $identitas->facebook?>" target="_blank"><i class="ashade-icon la la-facebook"></i></a>
                    <a href="<?php echo $identitas->instagram?>" target="_blank"><i class="ashade-icon la la-instagram"></i></a>
                    <a href="<?php echo $identitas->youtube?>" target="_blank"><i class="ashade-icon la la-youtube"></i></a>
                  </li>
                </ul>
							</div><!-- .ashade-contact-details -->
						</div><!-- .ashade-col -->
            <div class="ashade-col col-8">
              <iframe src="<?php echo $identitas->maps?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
					</div><!-- .ashade-row -->
				</section>
			</div><!-- .ashade-content -->

      <?php $this->load->view('frontend/bottom2')?>
    </div><!-- .ashade-content-scroll -->
    </main>

<div class="ashade-to-top-wrap ashade-back-wrap">
    <div class="ashade-back is-to-top">
        <span>Back to</span>
        <span>Top</span>
    </div>
</div>
<?php $this->load->view('frontend/aside')?>
<?php $this->load->view('frontend/js')?>
</div>
</body>
</html>
