<?php $users= $this->Crud_m->view_where('user', array('username'=> $this->session->username))->row_array(); ?>

<header class="header_wrap dark_skin hover_menu_style3">
  <div class="container">
    <nav class="navbar navbar-expand-lg">
    	  <a class="navbar-brand" href="<?php echo base_url()?>">
            <img class="logo_dark" src="<?php echo base_url()?>bahan/backend/foto/<?php echo $identitas->logo?>" alt="logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="ion-android-menu"></span> </button>
      	<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link" href="<?php echo base_url()?>">BERANDA</a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo base_url()?>#">LAYANAN</a>
                </li>
                <li >
                    <a class="nav-link" href="<?php echo base_url()?>#">GALERI</a>
                </li>
                <li >
                    <a class="nav-link" href="<?php echo base_url()?>">TENTANG</a>
                </li>
                <li class="dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown">INA | ENG</a>
                        <div class="dropdown-menu">
                            <ul> 
                                <li><a class="dropdown-item nav-link nav_item" href="#">INA (INDONESIA)</a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="#">ENG (ENGLISH)</a></li>
                            </ul>
                        </div>
                </li>
                
                
             

            </ul>
        </div>

    </nav>
  </div>
</header>
