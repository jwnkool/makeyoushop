 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="<?php echo base_url();?>assets/img/header.jpg">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo lang('login');?></h2>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>">Home</a></li>                   
          <li class="active"><?php echo lang('login');?></li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
				<?php echo form_open('secure/login', 'class="aa-login-form"'); ?>
                
                      	<label for=""><?php echo lang('email');?><span>*</span></label>
                       	<input type="text" name="email" placeholder="Username or email">
                        
                       	<label for=""><?php echo lang('password');?><span>*</span></label>
                        <input type="password" name="password" placeholder="Password">
                        
                    <label class="rememberme" for="rememberme">
                    	<input type="checkbox" id="rememberme" name="remember" type="true"> <?php echo lang('keep_me_logged_in');?> 
                    </label><hr>
                    <button type="submit" class="btn btn-primary"><?php echo lang('form_login');?></button>
				
                    <input type="hidden" value="<?php echo $redirect; ?>" name="redirect"/>
                    <input type="hidden" value="submitted" name="submitted"/>
                    
                  </form>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="aa-myaccount-register">  
                 <a href="<?php echo site_url('secure/forgot_password'); ?>" class="btn btn-warning"><i class="fa fa-refresh"></i> <?php echo lang('forgot_password')?></a>
                    <a href="<?php echo site_url('secure/register'); ?>" class="btn btn-success"><i class="fa fa-users"></i> <?php echo lang('register');?></a>
                </div>
              </div>

            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

