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
  <div class="off_canvars_overlay"> </div>
  <?php $this->load->view('frontend/menu')?>
  <!--breadcrumbs area start-->
  <div class="breadcrumbs_area">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="breadcrumb_content">
                      <ul>
                          <li><a href="index.html">Halaman Utama</a></li>
                          <li>Profil Akun</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- my account start  -->
  <div class="account_page_bg">
      <div class="container">
          <section class="main_content_area">
              <div class="account_dashboard">
                  <div class="row">
                      <div class="col-sm-12 col-md-3 col-lg-3">
                          <!-- Nav tabs -->
                          <div class="dashboard_tab_button">
                              <ul role="tablist" class="nav flex-column dashboard-list">
                                  <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a></li>
                                  <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                                  <li><a href="#downloads" data-toggle="tab" class="nav-link">Downloads</a></li>
                                  <li><a href="#address" data-toggle="tab" class="nav-link">Addresses</a></li>
                                  <li><a href="#account-details" data-toggle="tab" class="nav-link">Account details</a></li>
                                  <li><a href="login.html" class="nav-link">logout</a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="col-sm-12 col-md-9 col-lg-9">
                          <!-- Tab panes -->
                          <div class="tab-content dashboard_content">
                              <div class="tab-pane fade show active" id="dashboard">
                                  <h3>Dashboard </h3>
                                  <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">Edit your password and account details.</a></p>
                              </div>
                              <div class="tab-pane fade" id="orders">
                                  <h3>Orders</h3>
                                  <div class="table-responsive">
                                      <table class="table">
                                          <thead>
                                              <tr>
                                                  <th>Order</th>
                                                  <th>Date</th>
                                                  <th>Status</th>
                                                  <th>Total</th>
                                                  <th>Actions</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td>1</td>
                                                  <td>May 10, 2018</td>
                                                  <td><span class="success">Completed</span></td>
                                                  <td>$25.00 for 1 item </td>
                                                  <td><a href="cart.html" class="view">view</a></td>
                                              </tr>
                                              <tr>
                                                  <td>2</td>
                                                  <td>May 10, 2018</td>
                                                  <td>Processing</td>
                                                  <td>$17.00 for 1 item </td>
                                                  <td><a href="cart.html" class="view">view</a></td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                              <div class="tab-pane fade" id="downloads">
                                  <h3>Downloads</h3>
                                  <div class="table-responsive">
                                      <table class="table">
                                          <thead>
                                              <tr>
                                                  <th>Product</th>
                                                  <th>Downloads</th>
                                                  <th>Expires</th>
                                                  <th>Download</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td>Shopnovilla - Free Real Estate PSD Template</td>
                                                  <td>May 10, 2018</td>
                                                  <td><span class="danger">Expired</span></td>
                                                  <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                              </tr>
                                              <tr>
                                                  <td>Organic - ecommerce html template</td>
                                                  <td>Sep 11, 2018</td>
                                                  <td>Never</td>
                                                  <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                              <div class="tab-pane" id="address">
                                 <p>The following addresses will be used on the checkout page by default.</p>
                                  <h4 class="billing-address">Billing address</h4>
                                  <a href="#" class="view">Edit</a>
                                  <p><strong>Bobby Jackson</strong></p>
                                  <address>
                                      House #15<br>
                                      Road #1<br>
                                      Block #C <br>
                                      Banasree <br>
                                      Dhaka <br>
                                      1212
                                  </address>
                                  <p>Bangladesh</p>
                              </div>
                              <div class="tab-pane fade" id="account-details">
                                  <h3>Account details </h3>
                                  <div class="login">
                                      <div class="login_form_container">
                                          <div class="account_login_form">
                                              <form action="#">
                                                  <p>Already have an account? <a href="#">Log in instead!</a></p>
                                                  <div class="input-radio">
                                                      <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mr.</span>
                                                      <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mrs.</span>
                                                  </div> <br>
                                                  <label>First Name</label>
                                                  <input type="text" name="first-name">
                                                  <label>Last Name</label>
                                                  <input type="text" name="last-name">
                                                  <label>Email</label>
                                                  <input type="text" name="email-name">
                                                  <label>Password</label>
                                                  <input type="password" name="user-password">
                                                  <label>Birthdate</label>
                                                  <input type="text" placeholder="MM/DD/YYYY" value="" name="birthday">
                                                  <span class="example">
                                                    (E.g.: 05/31/1970)
                                                  </span>
                                                  <br>
                                                  <span class="custom_checkbox">
                                                      <input type="checkbox" value="1" name="optin">
                                                      <label>Receive offers from our partners</label>
                                                  </span>
                                                  <br>
                                                  <span class="custom_checkbox">
                                                      <input type="checkbox" value="1" name="newsletter">
                                                      <label>Sign up for our newsletter<br><em>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</em></label>
                                                  </span>
                                                  <div class="save_button primary_btn default_button">
                                                     <button type="submit">Save</button>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
      </div>
  </div>
  <!-- my account end   --> 

  			</div>
  		</div>
  	</div>

    <?php $this->load->view('frontend/bottom')?>
    <?php $this->load->view('frontend/js')?>
</div>
</body>
</html>
