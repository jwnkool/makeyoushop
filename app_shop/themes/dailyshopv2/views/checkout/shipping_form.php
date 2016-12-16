 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="<?php echo base_url();?>assets/img/header.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo lang('shipping_method');?></h2>
        <ol class="breadcrumb">                 
          <li><a href="#"><?php echo lang('shipping_method');?> &raquo; <?php echo lang('step_2');?></a></li>
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

<?php echo form_open('checkout/step_2');?>
	<div class="row">
		<div class="col-xs-6">
				<h2><?php echo lang('shipping_method');?></h2>
				<div class="alert alert-error" id="shipping_error_box" style="display:none"></div>
                <br />
				<a class="btn btn-warning btn-sm" href="<?php echo site_url('checkout/step_cekongkir');?>">
				<i class="fa fa-truck"></i> <?php echo lang('check_ongkir');?></a>
                <hr />
				<table class="table">
					<?php
					foreach($shipping_methods as $key=>$val):
						$ship_encoded	= md5(json_encode(array($key, $val)));
					
						if($ship_encoded == $shipping_code)
						{
							$checked = true;
						}
						else
						{
							$checked = false;
						}
					?>
					<tr style="cursor:pointer">
						<td style="width:16px;">
							<label class="radio"><?php echo form_radio('shipping_method', $ship_encoded, set_radio('shipping_method', $ship_encoded, $checked), 'id="s'.$ship_encoded.'"');?></label>
						</td>
						<td onclick="toggle_shipping('s<?php echo $ship_encoded;?>');"><?php echo $key;?></td>
						<td onclick="toggle_shipping('s<?php echo $ship_encoded;?>');"><strong><?php echo $val['str'];?></strong></td>
					</tr>
					<?php endforeach;?>
				</table>
		</div>
		<div class="col-xs-6">
			<h2><?php echo lang('shipping_instructions')?></h2>
			<?php echo form_textarea(array('name'=>'shipping_notes', 'value'=>set_value('shipping_notes', $this->go_cart->get_additional_detail('shipping_notes')), 'class'=>'form-control', 'style'=>'height:75px;'));?>
		</div>
	</div>
	<input class="btn btn-md btn-primary" type="submit" value="<?php echo lang('form_continue');?>"/>
</form>
                </div>
			</div>
		</div>
	</div>
</section>

<script>
	function toggle_shipping(key)
	{
		var check = $('#'+key);
		if(!check.attr('checked'))
		{
			check.attr('checked', true);
		}
	}
</script>