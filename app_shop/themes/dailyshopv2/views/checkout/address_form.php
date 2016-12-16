 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="<?php echo base_url();?>assets/img/header.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo lang('billing_address');?> &amp; <?php echo lang('shipping_address');?></h2>
        <ol class="breadcrumb">                 
          <li><a href="#"><?php echo lang('form_checkout');?> &raquo; <?php echo lang('step_1');?></a></li>
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
			
<style type="text/css">
	.placeholder {
		display:none;
	}
</style>


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

<script type="text/javascript">
	$(document).ready(function(){
		
		//if we support placeholder text, remove all the labels
		if(!supports_placeholder())
		{
			$('.placeholder').show();
		}
		
		<?php
		// Restore previous selection, if we are on a validation page reload
		$zone_id = set_value('zone_id');

		echo "\$('#zone_id').val($zone_id);\n";
		?>
	});
	
	function supports_placeholder()
	{
		return 'placeholder' in document.createElement('input');
	}
</script>



<script type="text/javascript">
$(document).ready(function() {
	$('#country_id').change(function(){
		populate_zone_menu();
	});	

});
// context is ship or bill
function populate_zone_menu(value)
{
	$.post('<?php echo site_url('locations/get_zone_menu');?>',{id:$('#country_id').val()}, function(data) {
		$('#zone_id').html(data);
	});
}
</script>
<?php /* Only show this javascript if the user is logged in */ ?>
<?php if($this->Customer_model->is_logged_in(false, false)) : ?>
<script type="text/javascript">	
	<?php
	$add_list = array();
	foreach($customer_addresses as $row) {
		// build a new array
		$add_list[$row['id']] = $row['field_data'];
	}
	$add_list = json_encode($add_list);
	echo "eval(addresses=$add_list);";
	?>
		
	function populate_address(address_id)
	{
		if(address_id == '')
		{
			return;
		}
		
		// - populate the fields
		$.each(addresses[address_id], function(key, value){
			
			$('.address[name='+key+']').val(value);

			// repopulate the zone menu and set the right value if we change the country
			if(key=='zone_id')
			{
				zone_id = value;
			}
		});
		
		// repopulate the zone list, set the right value, then copy all to billing
		$.post('<?php echo site_url('locations/get_zone_menu');?>',{id:$('#country_id').val()}, function(data) {
			$('#zone_id').html(data);
			$('#zone_id').val(zone_id);
		});		
	}
	
</script>
<?php endif;?>

<?php
$countries = $this->Location_model->get_countries_menu();

if(!empty($customer[$address_form_prefix.'_address']['country_id']))
{
	$zone_menu	= $this->Location_model->get_zones_menu($customer[$address_form_prefix.'_address']['country_id']);
}
else
{
	$zone_menu = array(''=>'')+$this->Location_model->get_zones_menu(array_shift(array_keys($countries)));
}

//form elements

$company	= array('placeholder'=>lang('address_company'),'class'=>'address form-control', 'name'=>'company', 'value'=> set_value('company', @$customer[$address_form_prefix.'_address']['company']));
$address1	= array('placeholder'=>lang('address1'), 'class'=>'address form-control', 'name'=>'address1', 'value'=> set_value('address1', @$customer[$address_form_prefix.'_address']['address1']));
$address2	= array('placeholder'=>lang('address2'), 'class'=>'address form-control', 'name'=>'address2', 'value'=>  set_value('address2', @$customer[$address_form_prefix.'_address']['address2']));
$first		= array('placeholder'=>lang('address_firstname'), 'class'=>'address form-control', 'name'=>'firstname', 'value'=>  set_value('firstname', @$customer[$address_form_prefix.'_address']['firstname']));
$last		= array('placeholder'=>lang('address_lastname'), 'class'=>'address form-control', 'name'=>'lastname', 'value'=>  set_value('lastname', @$customer[$address_form_prefix.'_address']['lastname']));
$email		= array('placeholder'=>lang('address_email'), 'class'=>'address form-control', 'name'=>'email', 'value'=> set_value('email', @$customer[$address_form_prefix.'_address']['email']));
$phone		= array('placeholder'=>lang('address_phone'), 'class'=>'address form-control', 'name'=>'phone', 'value'=> set_value('phone', @$customer[$address_form_prefix.'_address']['phone']));
$city		= array('placeholder'=>lang('address_city'), 'class'=>'address form-control', 'name'=>'city', 'value'=> set_value('city', @$customer[$address_form_prefix.'_address']['city']));
$zip		= array('placeholder'=>lang('address_zip'), 'maxlength'=>'10', 'class'=>'address form-control', 'name'=>'zip', 'value'=> set_value('zip', @$customer[$address_form_prefix.'_address']['zip']));


?>
	
	<?php
	//post to the correct place.
	echo ($address_form_prefix == 'bill')?form_open('checkout/step_1'):form_open('checkout/shipping_address');?>
		<div class="row">
			<?php // Address form ?>
			<div class="col-xs-12 offset2">
            
				<div class="row">
					<div class="col-xs-12">
						<label class="placeholder"><?php echo lang('address_company');?></label>
						<?php echo form_input($company);?><br />
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<label class="placeholder"><?php echo lang('address_firstname');?><b class="r"> *</b></label>
						<?php echo form_input($first);?><br />
					</div>
					<div class="col-xs-6">
						<label class="placeholder"><?php echo lang('address_lastname');?><b class="r"> *</b></label>
						<?php echo form_input($last);?><br />
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<label class="placeholder"><?php echo lang('address_email');?><b class="r"> *</b></label>
						<?php echo form_input($email);?><br />
					</div>

					<div class="col-xs-6">
						<label class="placeholder"><?php echo lang('address_phone');?><b class="r"> *</b></label>
						<?php echo form_input($phone);?><br />
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6">
						<label class="placeholder"><?php echo lang('address_country');?><b class="r"> *</b></label>
						<?php echo form_dropdown('country_id',$countries, @$customer[$address_form_prefix.'_address']['country_id'], 'id="country_id" class="address form-control"');?><br />
					</div>
					<div class="col-xs-6">
						<label class="placeholder"><?php echo lang('address_state');?><b class="r"> *</b></label>
						<?php 
							echo form_dropdown('zone_id',$zone_menu, @$customer[$address_form_prefix.'_address']['zone_id'], 'id="zone_id" class="address form-control" ');?>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<label class="placeholder"><?php echo lang('address1');?><b class="r"> *</b></label>
						<?php echo form_input($address1);?><br />
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-12">
						<label class="placeholder"><?php echo lang('address2');?></label>
						<?php echo form_input($address2);?><br />
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6">
						<label class="placeholder"><?php echo lang('address_city');?><b class="r"> *</b></label>
						<?php echo form_input($city);?><br />
					</div>
					<div class="col-xs-6">
						<label class="placeholder"><?php echo lang('address_zip');?><b class="r"> *</b></label>
						<?php echo form_input($zip);?><br />
					</div>
				</div>
				<?php if($address_form_prefix=='bill') : ?>
				<div class="row">
					<div class="col-xs-12">
						<label class="inline" for="use_shipping">
						<?php echo form_checkbox(array('name'=>'use_shipping', 'value'=>'yes', 'id'=>'use_shipping', 'checked'=>$use_shipping)) ?>
						<?php echo lang('ship_to_address') ?>
						</label><hr />
					</div>
				</div>
				<?php endif ?>

				<div class="row">
					<div class="col-xs-2">
						<?php if($address_form_prefix=='ship') : ?>
						<input class="btn btn-block btn-md btn-success" type="button" value="<?php echo lang('form_previous');?>" onclick="window.location='<?php echo site_url('checkout/step_1') ?>'"/>
                    </div>
					<div class="col-xs-2">
						<?php endif; ?>
						<input class="btn btn-block btn-md btn-primary" type="submit" value="<?php echo lang('form_continue');?>"/>
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