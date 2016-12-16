 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="<?php echo base_url();?>assets/img/header.jpg">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo lang('giftcard');?></h2>
        <ol class="breadcrumb">                 
          <li><a href="#"><?php echo lang('giftcard');?></li>
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
        
<?php echo form_open('cart/giftcard');?>
    <div class="row" style="margin-top:20px;">
        <div class="col-xs-4">
            <div id="primary-img">
                <?php echo theme_img('giftcard.jpg', lang('giftcard'));?>
            </div>
        </div>
        <div class="span8">
            <div class="row">
                <div class="span8">
                    <h2 style="font-weight:normal"><?php echo lang('giftcard');?></h2>
                </div>
            </div>
            
            <?php if(is_array($preset_values)):?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="control-group">
                        <div class="controls">
                            <label class="radio">
                                <?php   
                                if(set_value('amount')=='preset_amount')
                                {
                                    $checked = true;
                                }
                                else
                                {
                                    $checked = false;
                                }

                                echo form_radio('amount', 'preset_amount', $checked);
                                ?>
                        
                                <?php echo lang('giftcard_choose_amount');?>
                            </label>
                        </div>
                    </div>

                    <?php 
                            foreach($preset_values as $value)
                            {
                                $options[$value] = "\$$value";
                            }
                            echo form_dropdown('preset_amount', $options, set_value('preset_amount'));
                      ?>
                </div>
            </div>
            <?php endif;?>
            
            <?php if($allow_custom_amount):?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="control-group">
                        <div class="controls">
                            <label class="radio">
                                <?php   
                                if(set_value('amount')=='custom_amount')
                                {
                                    $checked = true;
                                }
                                else
                                {
                                    $checked = false;
                                }

                                echo form_radio('amount', 'custom_amount', $checked);
                                ?>

                                <?php echo lang('giftcard_custom_amount');?>
                            </label>
                        </div>
                    </div>
                    <?php echo form_input('custom_amount', set_value('custom_amount'));?>
                </div>
            </div>
            <?php endif;?>
            <div class="row">
                <div class="col-xs-12">

                    <label><?php echo lang('giftcard_to');?></label>
                    <?php echo form_input('gc_to_name', set_value('gc_to_name')); ?>
            
                    <label><?php echo lang('giftcard_email');?></label>
                    <?php echo form_input('gc_to_email', set_value('gc_to_email')); ?>
            
                    <label><?php echo lang('giftcard_from');?></label>
                    <?php echo form_input('gc_from', set_value('gc_from')); ?>
            
                    <label><?php echo lang('giftcard_message');?></label>
                    <?php 
                    $data = array(
                      'name'        => 'message',
                      'rows'   => '5',
                      'cols'        => '30'
                    );
            
                    echo form_textarea($data,set_value('message')); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input type="submit" class="btn btn-primary" value="<?php echo lang('form_add_to_cart');?>"/>
                </div>
            </div>
        </div>
    </div>
</form>  
				</div>
			</div>
		</div>
	</div>
</section>