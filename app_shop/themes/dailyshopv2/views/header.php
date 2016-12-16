<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title><?php echo (!empty($seo_title)) ? $seo_title .' - ' : ''; echo $this->config->item('company_name'); ?></title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/icon.png">
    
	<?php if(isset($meta)):?>
        <?php echo $meta;?>
    <?php else:?>
        <meta name="Keywords" content="MakeYouShop, Open Source Ecommerce Indonesia, Copyleft Project">
        <meta name="Description" content="MakeYouShop is an open source ecommerce built on the Code Igniter framework and GoCart">
    <?php endif;?>
    
    <?php echo theme_css('font-awesome.css', true);?>
    <?php echo theme_css('bootstrap.css', true);?>
    <?php echo theme_css('jquery.smartmenus.bootstrap.css', true);?>
    <?php echo theme_css('jquery.simpleLens.css', true);?>
    <?php echo theme_css('slick.css', true);?>
    <?php echo theme_css('nouislider.css', true);?>
    <?php echo theme_css('lite-blue-theme.css', true);?>
    <?php echo theme_css('style.css', true);?>
	<?php echo theme_css('etalage.css', true);?>
    
    <?php echo theme_js('jquery.min.js', true);?>
    <?php echo theme_js('bootstrap.js', true);?>
    <?php echo theme_js('jquery.smartmenus.js', true);?>
    <?php echo theme_js('jquery.smartmenus.bootstrap.js', true);?>
    <?php echo theme_js('jquery.simpleGallery.js', true);?>
    <?php echo theme_js('jquery.simpleLens.js', true);?>
    <?php echo theme_js('slick.js', true);?>
    <?php echo theme_js('nouislider.js', true);?>
    <?php echo theme_js('custom.js', true);?>
	<?php echo theme_js('jquery.etalage.min.js', true);?>
    
	<?php
    //with this I can put header data in the header instead of in the body.
    if(isset($additional_header_info))
    {
        echo $additional_header_info;
    }
    
    ?>

  </head>
  <body> 
      
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
				
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-envelope"></span><?php echo $this->config->item('email');?></p>
                </div>
                <!-- / cellphone -->
                
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span><?php echo $this->config->item('telephone');?></p>
                </div>
                <!-- / cellphone -->
                
              </div>
              <!-- / header top left -->
              
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
            		<?php
						if(isset($this->pages[0]))
						{
							foreach($this->pages[0] as $menu_page):?>
								<li>
								<?php if(empty($menu_page->content)):?>
									<a href="<?php echo site_url($menu_page->slug);?>"><?php echo $menu_page->menu_title;?></a>
								<?php else:?>
									<a href="<?php echo $menu_page->url;?>" <?php if($menu_page->new_window ==1){echo 'target="_blank"';} ?>><?php echo $menu_page->menu_title;?></a>
								<?php endif;?>
								</li>
								
							<?php endforeach;	
						}
					?>
                    
						<?php if($this->Customer_model->is_logged_in(false, false)):?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-briefcase"></i> <?php echo lang('welcome_account');?> <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo  site_url('secure/my_account');?>"><?php echo lang('my_account')?></a></li>
									<li><a href="<?php echo  site_url('secure/my_downloads');?>"><?php echo lang('my_downloads')?></a></li>
									<li><a href="<?php echo site_url('secure/logout');?>"><?php echo lang('logout');?></a></li>
								</ul>
							</li>
						<?php else: ?>
							<li><a href="<?php echo site_url('secure/login');?>"><i class="fa fa-user"></i> <?php echo lang('login');?></a></li>
						<?php endif; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="<?php echo base_url();?>" title="<?php echo $this->config->item('company_name');?>">
                  <span class="fa fa-home"></span>
                  <p><strong><?php echo $this->config->item('company_name');?></strong> <span>Open Source Shop Online</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="<?php echo site_url('cart/view_cart');?>">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">
							<?php
								if ($this->go_cart->total_items()==0)
								{
									echo lang('empty_cart');
								}
								else
								{
									if($this->go_cart->total_items() > 1)
									{
										echo sprintf (lang('multiple_items'), $this->go_cart->total_items());
									}
									else
									{
										echo sprintf (lang('single_item'), $this->go_cart->total_items());
									}
								}
							?></span>
                </a>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <?php echo form_open('cart/search');?>
                  <input type="text" name="term" placeholder="<?php echo lang('search');?>">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <?php if(isset($this->categories[0])):?>
					<?php foreach($this->categories[0] as $cat_menu):?>
						<li <?php echo $cat_menu->active ? 'class="active"' : false; ?>><a href="<?php echo site_url($cat_menu->slug);?>"><?php echo $cat_menu->name;?></a></li>
					<?php endforeach;?>
               <?php endif;?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->
  
		<?php if ($this->session->flashdata('message')):?>
		<div class="container">
          <div class="row">
            <div class="col-md-12"><br />
                <div class="alert alert-info alert-dismissable">
                    <i class="fa fa-info"></i> <a class="close" data-dismiss="alert">×</a>
                    <?php echo $this->session->flashdata('message');?>
                </div>
            </div>
          </div>
        </div>
		<?php endif;?>
		
		<?php if ($this->session->flashdata('error')):?>
        <div class="container">
          <div class="row">
            <div class="col-md-12"><br />
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-ban"></i> <a class="close" data-dismiss="alert">×</a>
                    <?php echo $this->session->flashdata('error');?>
                </div>
            </div>
          </div>
        </div>
		<?php endif;?>
		
		<?php if (!empty($error)):?>
		<div class="container">
          <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-ban"></i> <a class="close" data-dismiss="alert">×</a>
                    <?php echo $error;?>
                </div>
            </div>
          </div>
        </div>
		<?php endif;?>
		
