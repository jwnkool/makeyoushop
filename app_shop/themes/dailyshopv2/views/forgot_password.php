 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="<?php echo base_url();?>assets/img/header.jpg">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo lang('forgot_password');?></h2>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>">Home</a></li>                   
          <li class="active"><?php echo lang('forgot_password');?></li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
  
  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
			<?php echo form_open('secure/forgot_password', 'class="aa-subscribe-form"') ?>
              	<input type="email" name="email" id="" placeholder="<?php echo lang('email');?>">
				<input type="hidden" value="submitted" name="submitted"/>
				<input type="submit" value="<?php echo lang('reset');?>" name="submit"/>
            </form>
            <hr />
            <a href="<?php echo site_url('secure/login'); ?>"><i class="fa fa-reply"></i> <?php echo lang('return_to_login');?></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->
