 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="<?php echo base_url();?>assets/img/header.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo lang('payment_method');?></h2>
        <ol class="breadcrumb">                 
          <li><a href="#"><?php echo lang('payment_method');?> &raquo; <?php echo lang('step_3');?></a></li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">

		<?php if (validation_errors()):?>
    		<div class="container">
              <div class="row">
                <div class="col-md-11"><br />
                    <div class="alert alert-info alert-dismissable">
                        <i class="fa fa-info"></i> <a class="close" data-dismiss="alert">×</a>
                        <?php echo validation_errors();?>
                    </div>
                </div>
              </div>
            </div>
			<?php endif;?>

<?php include('order_details.php');?>

	<div class="row">
		<div class="col-xs-12">
			<h2><?php echo lang('payment_method');?></h2>
			<div class="tabbable tabs-left">
				<ul class="nav nav-tabs">
				<?php
				if(empty($payment_method))
				{
					$selected	= key($payment_methods);
				}
				else
				{
					$selected	= $payment_method['module'];
				}
				foreach($payment_methods as $method=>$info):?>
					<li <?php echo ($selected == $method)?'class="active"':'';?>><a href="#payment-<?php echo $method;?>" data-toggle="tab"><?php echo $info['name'];?></a></li>
				<?php endforeach;?>
				</ul>
				<div class="tab-content">
					<?php foreach ($payment_methods as $method=>$info):?>
						<div id="payment-<?php echo $method;?>" class="tab-pane<?php echo ($selected == $method)?' active':'';?>">
							<?php echo form_open('checkout/step_3', 'id="form-'.$method.'"');?>
								<input type="hidden" name="module" value="<?php echo $method;?>" />
								<?php echo $info['form'];?>
                                <hr />
								<input class="btn btn-primary" type="submit" value="<?php echo lang('form_continue');?>"/>
							</form>
						</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
    
    			</div>
			</div>
		</div>
	</div>
</section>