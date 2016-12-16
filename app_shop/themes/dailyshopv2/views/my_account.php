 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="<?php echo base_url();?>assets/img/header.jpg">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo lang('account_information');?></h2>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>">Home</a></li>                   
          <li class="active"><?php echo lang('account_information');?></li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
  
<?php if(validation_errors()):?>
<div class="alert allert-error">
	<a class="close" data-dismiss="alert">×</a>
	<?php echo validation_errors();?>
</div>
<?php endif;?>
<script>
$(document).ready(function(){
	$('.delete_address').click(function(){
		if($('.delete_address').length > 1)
		{
			if(confirm('<?php echo lang('delete_address_confirmation');?>'))
			{
				$.post("<?php echo site_url('secure/delete_address');?>", { id: $(this).attr('rel') },
					function(data){
						$('#address_'+data).remove();
						$('#address_list .my_account_address').removeClass('address_bg');
						$('#address_list .my_account_address:even').addClass('address_bg');
					});
			}
		}
		else
		{
			alert('<?php echo lang('error_must_have_address');?>');
		}	
	});
	
	$('.edit_address').click(function(){
		$.post('<?php echo site_url('secure/address_form'); ?>/'+$(this).attr('rel'),
			function(data){
				$('#address-form-container').html(data).modal('show');
			}
		);
	});
});


function set_default(address_id, type)
{
	$.post('<?php echo site_url('secure/set_default_address') ?>/',{id:address_id, type:type});
}


</script>


<?php
$company	= array('id'=>'company', 'class'=>'', 'name'=>'company', 'value'=> set_value('company', $customer['company']));
$first		= array('id'=>'firstname', 'class'=>'', 'name'=>'firstname', 'value'=> set_value('firstname', $customer['firstname']));
$last		= array('id'=>'lastname', 'class'=>'', 'name'=>'lastname', 'value'=> set_value('lastname', $customer['lastname']));
$email		= array('id'=>'email', 'class'=>'', 'name'=>'email', 'value'=> set_value('email', $customer['email']));
$phone		= array('id'=>'phone', 'class'=>'', 'name'=>'phone', 'value'=> set_value('phone', $customer['phone']));

$password	= array('id'=>'password', 'class'=>'', 'name'=>'password', 'value'=>'');
$confirm	= array('id'=>'confirm', 'class'=>'', 'name'=>'confirm', 'value'=>'');
?>	
  <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
       
	<div class="col-xs-12">
		<div class="my-account-box">
		<?php echo form_open('secure/my_account'); ?>
			<fieldset class="aa-login-form">
            <br />
				<div class="row">
					<div class="col-xs-12">
						<label for="company"><?php echo lang('account_company');?></label>
						<?php echo form_input($company);?>
					</div>
				</div>
				<div class="row">	
					<div class="col-xs-6">
						<label for="account_firstname"><?php echo lang('account_firstname');?></label>
						<?php echo form_input($first);?>
					</div>
				
					<div class="col-xs-6">
						<label for="account_lastname"><?php echo lang('account_lastname');?></label>
						<?php echo form_input($last);?>
					</div>
				</div>
			
				<div class="row">
					<div class="col-xs-6">
						<label for="account_email"><?php echo lang('account_email');?></label>
						<?php echo form_input($email);?>
					</div>
				
					<div class="col-xs-6">
						<label for="account_phone"><?php echo lang('account_phone');?></label>
						<?php echo form_input($phone);?>
					</div>
				</div><hr />
			
				<div class="row">
					<div class="col-xs-12">
							<input type="checkbox" name="email_subscribe" value="1" <?php if((bool)$customer['email_subscribe']) { ?> checked="checked" <?php } ?>/> <?php echo lang('account_newsletter_subscribe');?>
					</div>
				</div>
			
				<div class="row">
					<div class="col-xs-12">
						<div style="margin:30px 0px 10px; text-align:center;">
							<strong><?php echo lang('account_password_instructions');?></strong>
						</div>
					</div>
				</div>
			
				<div class="row">	
					<div class="col-xs-6">
						<label for="account_password"><?php echo lang('account_password');?></label>
						<?php echo form_password($password);?>
					</div>

					<div class="col-xs-6">
						<label for="account_confirm"><?php echo lang('account_confirm');?></label>
						<?php echo form_password($confirm);?>
					</div>
				</div>
				<hr />
				<input type="submit" value="<?php echo lang('form_submit');?>" class="btn btn-info" />

			</fieldset>
		</form>
		</div>
	</div>
	
	<!--div class="col-xs-12 pull-right">
		<div class="row" style="padding-top:10px;">
			<div class="col-xs-12">
				<h2><?php echo lang('address_manager');?></h2>
			</div>
			<div class="span3" style="text-align:right;">
				<input type="button" class="btn edit_address btn-warning" rel="0" value="<?php echo lang('add_address');?>"/>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12" id='address_list'>
			<?php if(count($addresses) > 0):?>
				<table class="table table-bordered table-striped">
			<?php
			$c = 1;
				foreach($addresses as $a):?>
					<tr id="address_<?php echo $a['id'];?>">
						<td>
							<?php
							$b	= $a['field_data'];
							echo format_address($b, true);
							?>
						</td>
						<td>
							<div class="row-fluid">
								<div class="col-xs-12">
									<div class="btn-group pull-right">
										<input type="button" class="btn edit_address" rel="<?php echo $a['id'];?>" value="<?php echo lang('form_edit');?>" />
										<input type="button" class="btn btn-danger delete_address" rel="<?php echo $a['id'];?>" value="<?php echo lang('form_delete');?>" />
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="col-xs-12">
									<div class="pull-right" style="padding-top:10px;">
										<input type="radio" name="bill_chk" onclick="set_default(<?php echo $a['id'] ?>, 'bill')" <?php if($customer['default_billing_address']==$a['id']) echo 'checked="checked"'?> /> <?php echo lang('default_billing');?>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="ship_chk" onclick="set_default(<?php echo $a['id'] ?>,'ship')" <?php if($customer['default_shipping_address']==$a['id']) echo 'checked="checked"'?>/> <?php echo lang('default_shipping');?>
									</div>
								</div>
							</div>
						</td>
					</tr>
				<?php endforeach;?>
				</table>
			<?php endif;?>
			</div>
		</div>
	</div-->

	<div class="row">
		<div class="col-xs-12">
                <div class="page-header">
                    <h2><?php echo lang('order_history');?></h2>
                </div>
                <?php if($orders):
                    echo $orders_pagination;
                ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><?php echo lang('order_date');?></th>
                            <th><?php echo lang('order_number');?></th>
                            <th><?php echo lang('order_status');?></th>
                            <th><?php echo lang('notes');?></th>
                        </tr>
                    </thead>
        
                    <tbody>
                    <?php
                    foreach($orders as $order): ?>
                        <tr>
                            <td>
                                <?php $d = format_date($order->ordered_on); 
                        
                                $d = explode(' ', $d);
                                echo $d[1].' '.$d[0].' '.$d[3];
                        
                                ?>
                            </td>
                            <td><?php echo $order->order_number; ?></td>
                            <td><code><?php echo $order->status;?></code></td>
                            <td><?php echo $order->notes; ?></td>
                        </tr>
                
                    <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                    <?php echo lang('no_order_history');?>
                <?php endif;?>
            </div>
        </div>

<div id="address-form-container" class="hide">
</div>
       </div>
     </div>
   </div>
 </section>