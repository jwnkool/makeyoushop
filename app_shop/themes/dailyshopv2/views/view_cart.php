 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="<?php echo base_url();?>assets/img/header.jpg">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo lang('your_cart');?></h2>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>">Home</a></li>                   
          <li class="active"><?php echo lang('your_cart');?></li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
  
   <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">

			<?php if ($this->go_cart->total_items()==0):?>
            <div class="container">
              <div class="row">
                <div class="col-md-11"><br />
                    <div class="alert alert-info alert-dismissable">
                        <i class="fa fa-info"></i> <a class="close" data-dismiss="alert">×</a>
                        <?php echo lang('empty_view_cart');?>
                    </div>
                </div>
              </div>
            </div>
            
			<?php else: ?>
    
    <?php echo form_open('cart/update_cart', array('id'=>'update_cart_form'));?>
    
    <?php include('checkout/summary.php');?>
    
    
    <div class="row">
        <div class="col-xs-4">
            <input type="text" name="coupon_code" class="form-control" style="margin:0px;" placeholder="<?php echo lang('coupon_label');?>">
        </div>
        <div class="col-xs-2">
            <input class="form-control btn btn-md btn-warning" type="submit" value="<?php echo lang('apply_coupon');?>"/>
         </div>
         <div class="col-xs-4">   
            <?php if($gift_cards_enabled):?>
                <input type="text" name="gc_code" class="form-control" style="margin:0px;" placeholder="<?php echo lang('gift_card_label');?>">
         </div>
         <div class="col-xs-2">
                <input class="form-control btn btn-md btn-success"  type="submit" value="<?php echo lang('apply_gift_card');?>"/>
            <?php endif;?>
        </div>
        <br /><br />
        <div class="col-xs-6 pull-right" style="text-align:right;">
                <input id="redirect_path" type="hidden" name="redirect" value=""/>
    
                <?php if(!$this->Customer_model->is_logged_in(false,false)): ?>
                    <input class="btn btn-md btn-default" type="submit" onclick="$('#redirect_path').val('checkout/login');" value="<?php echo lang('login');?>"/>
                    <input class="btn btn-md btn-default" type="submit" onclick="$('#redirect_path').val('checkout/register');" value="<?php echo lang('register_now');?>"/>
                <?php endif; ?>
                    <input class="btn btn-md btn-danger" type="submit" value="<?php echo lang('form_update_cart');?>"/>
                    
            <?php if ($this->Customer_model->is_logged_in(false,false) || !$this->config->item('require_login')): ?>
                <input class="btn btn-large btn-primary" type="submit" onclick="$('#redirect_path').val('checkout');" value="<?php echo lang('form_checkout');?>"/>
            <?php endif; ?>
            
        </div>
    </div>

</form>
<?php endif; ?>		
					</div>
				</div>
			</div>
		</div>
	</div>
</section>