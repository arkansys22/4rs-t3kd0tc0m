<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>404 Halaman Tidak Ada - <?php echo $identitas->nama_website?></title>
    <meta name="title" content="<?php echo $identitas->nama_website?> <?php echo $identitas->no_telp?> | <?php echo $identitas->meta_keyword?>">
    <meta property="og:title" content="<?php echo $identitas->nama_website?> <?php echo $identitas->no_telp?> | <?php echo $identitas->meta_keyword?>">
    <meta NAME="ROBOTS" CONTENT="noindex, nofollow">
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

<body class="has-spotlight ashade-smooth-scroll is-centered ashade-maintenance-wrap">
    <?php $this->load->view('frontend/menu')?>
    <div class="ashade-page-title-wrap">
        <h1 class="ashade-page-title">
            <span>Sorry, this page isn't available.</span>
           Page Not Found
        </h1>
    </div>
    <main class="ashade-content-wrap">
	<div class="ashade-content-scroll">
    <div class="ashade-content">
				<section class="ashade-section">
                    <div class="ashade-row ashade-row-middle">
                        <div class="ashade-col col-8">
								Unfortunately, the page you were trying to view may have been moved, you may have typed in the wrong address, or if the page was hosted on our old website it may now no longer exist.
							<br><br>
							<a href="<?php echo base_url()?>" class="ashade-button">Back Home</a>
							
                        </div><!-- .ashade-col -->
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
                    <a href="<?php echo $identitas->facebook?>" target="_blank">Fb</a>
                    <a href="<?php echo $identitas->instagram?>" target="_blank">In</a>
                    <a href="<?php echo $identitas->youtube?>" target="_blank">Yt</a>
                  </li>
                </ul>
                                </ul>
                            </div><!-- .ashade-contact-details -->
                        </div><!-- .ashade-col -->
                    </div><!-- .ashade-row -->
				</section>
			</div><!-- .ashade-content -->
    <?php $this->load->view('frontend/bottom2')?>
  </div><!-- .ashade-content-scroll -->
</main>
<?php $this->load->view('frontend/aside')?>
    <?php $this->load->view('frontend/js')?>

</body>
</html>
