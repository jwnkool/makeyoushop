 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="<?php echo base_url();?>assets/img/header.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo lang('submit_order');?></h2>
        <ol class="breadcrumb">                 
          <li><a href="#"><?php echo lang('submit_order');?> &raquo; <?php echo lang('step_4');?></a></li>
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
			<?php include('order_details.php');?>
            <?php include('summary.php');?>
                    <div class="row">
                        <div class="col-xs-12">
                            <a class="btn btn-primary" href="<?php echo site_url('checkout/place_order');?>"><?php echo lang('submit_order');?></a>
                        </div>
                    </div>
    			</div>
			</div>
		</div>
	</div>
</section>