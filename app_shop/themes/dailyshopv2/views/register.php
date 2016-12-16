 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="<?php echo base_url();?>assets/img/header.jpg">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo lang('form_register');?></h2>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>">Home</a></li>                   
          <li class="active"><?php echo lang('form_register');?></li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
<?php
$company	= array('id'=>'bill_company', 'class'=>'', 'name'=>'company', 'value'=> set_value('company'));
$first		= array('id'=>'bill_firstname', 'class'=>'', 'name'=>'firstname', 'value'=> set_value('firstname'));
$last		= array('id'=>'bill_lastname', 'class'=>'', 'name'=>'lastname', 'value'=> set_value('lastname'));
$email		= array('id'=>'bill_email', 'class'=>'', 'name'=>'email', 'value'=>set_value('email'));
$phone		= array('id'=>'bill_phone', 'class'=>'', 'name'=>'phone', 'value'=> set_value('phone'));
?> 
  <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
			<?php echo form_open('secure/register', 'class="aa-login-form"'); ?>
                <input type="hidden" name="submitted" value="submitted" />
                <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
                
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                	<label for=""><?php echo lang('account_company');?></label>
                    <?php echo form_input($company);?>
                    
					<label for=""><?php echo lang('account_firstname');?><span>*</span></label>
					<?php echo form_input($first);?>
                    
					<label for=""><?php echo lang('account_lastname');?><span>*</span></label>
					<?php echo form_input($last);?>
                    
                 	<label for=""><?php echo lang('account_email');?><span>*</span></label>
					<?php echo form_input($email);?>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="aa-myaccount-register">      
					<label for=""><?php echo lang('account_phone');?><span>*</span></label>
					<?php echo form_input($phone);?>
						
                    <label>
						<input type="checkbox" name="email_subscribe" value="1" <?php echo set_radio('email_subscribe', '1', TRUE); ?>/> <?php echo lang('account_newsletter_subscribe');?>
					</label><br />
                    
					<label for=""><?php echo lang('account_password');?><span>*</span></label>
					<input type="password" name="password" value="" class="" autocomplete="off" />
                        
					<label for=""><?php echo lang('account_confirm');?><span>*</span></label>
					<input type="password" name="confirm" value="" class="" autocomplete="off" />
                </div>
              </div>
            </div>  
				<input type="submit" value="<?php echo lang('form_register');?>" class="btn btn-primary col-xs-12" />
            </form>    
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
