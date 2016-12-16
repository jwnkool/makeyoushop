<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_coupons');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('coupon_form') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('coupon_form') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<script type="text/javascript">
                    $(function(){
                    $("#datepicker1").datepicker({dateFormat: 'mm-dd-yy', altField: '#datepicker1_alt', altFormat: 'yy-mm-dd'}).attr('readonly', 'readonly');
                    $("#datepicker2").datepicker({dateFormat: 'mm-dd-yy', altField: '#datepicker2_alt', altFormat: 'yy-mm-dd'}).attr('readonly', 'readonly');
                    });
                    </script>

					<?php echo form_open('backend_coupons/form/'.$id); ?>

                    <div class="alert alert-info" style="text-align:center;">
                        <strong><?php echo sprintf(lang('times_used'), @$num_uses);?></strong>
                    </div>
                    
                    <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="code"><?php echo lang('coupon_code');?></label>
                                    <?php
                                    $data	= array('name'=>'code', 'value'=>set_value('code', $code), 'class'=>'form-control');
                                    echo form_input($data);
                                    ?>
                                </div>
                                <div class="col-xs-4">    
                                    <label for="max_uses"><?php echo lang('max_uses');?></label>
                                    <?php
                                    $data	= array('name'=>'max_uses', 'value'=>set_value('max_uses', $max_uses), 'class'=>'form-control');
                                    echo form_input($data);
                                    ?>
                               </div>
                               <div class="col-xs-4">   
                                    <label for="max_product_instances"><?php echo lang('limit_per_order')?></label>
                                    <?php
                                    $data	= array('name'=>'max_product_instances', 'value'=>set_value('max_product_instances', $max_product_instances), 'class'=>'form-control');
                                    echo form_input($data);
                                    ?>
                                </div>
                             </div>
                             
                    <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="start_date"><?php echo lang('enable_on');?></label>
                                    <?php
                                    $data	= array('id'=>'datepicker1', 'value'=>set_value('start_date', reverse_format($start_date)), 'class'=>'form-control');
                                    echo form_input($data);
                                    ?><br />
                                    <input type="button" value="Clear" class="btn btn-sm btn-success" onclick="$('#datepicker1_alt').val('');$('#datepicker1').val('');" />
                                    <input type="hidden" name="start_date" value="<?php echo set_value('start_date', $start_date) ?>" id="datepicker1_alt" readonly />
                                </div>
                                <div class="col-xs-6">
                                    <label for="end_date"><?php echo lang('disable_on');?></label>
                                    <?php
                                    $data	= array('id'=>'datepicker2', 'value'=>set_value('end_date', reverse_format($end_date)), 'class'=>'form-control');
                                    echo form_input($data);
                                    ?>
                                    <br />
                                    <input type="button" value="Clear"  class="btn btn-sm btn-success" onclick="$('#datepicker2_alt').val('');$('#datepicker2').val('');" />
                                    <input type="hidden" name="end_date" value="<?php echo set_value('end_date', $end_date) ?>" id="datepicker2_alt" readonly />
                                </div>
                            </div>
                       </div>
                       
                    <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-4">
                                <label for="reduction_target"><?php echo lang('coupon_type');?></label>
                                <?php
                                    $options = array(
                                    'price'  => lang('price_discount'),
                                    'shipping' => lang('free_shipping')
                                    );
                                    echo form_dropdown('reduction_target', $options,  $reduction_target, 'id="gc_coupon_type" class="form-control"');
                                ?>
                                </div>
                                <div class="col-xs-4">
                                <label for="reduction_amount"><?php echo lang('reduction_amount')?></label>
                                    <?php	$options = array(
                                          'percent'  => lang('percentage'),
                                          'fixed' => lang('fixed')
                                        );
                                        echo ' '.form_dropdown('reduction_type', $options,  $reduction_type, 'class="form-control"');
                                    ?>
                                        <?php
                                            $data	= array('id'=>'reduction_amount', 'name'=>'reduction_amount', 'value'=>set_value('reduction_amount', $reduction_amount), 'class'=>'form-control');
                                            echo form_input($data);?>
                                </div>
                             </div>
                        </div>
                        
                        
                    <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-4">
									<?php
                                        $options = array(
                                          '1' => lang('apply_to_whole_order'),
                                          '0' => lang('apply_to_select_items')
                                        );
                                        echo form_dropdown('whole_order_coupon', $options,  set_value(0, $whole_order_coupon), 'id="gc_coupon_appliesto_fields" class="form-control"');
                                    ?>
                                    <div id="gc_coupon_products">
                                        <table width="100%" border="0" style="margin-top:10px;" cellspacing="5" cellpadding="0">
                                        <?php echo $product_rows; ?>
                                        </table>
                                    </div>
                               </div>
                        </div><hr />
                    </div>
                    
                    <button type="submit" class="btn btn-primary"><?php echo lang('save');?></button>
                    
                    </form>

					</div><!-- /.row -->
             </section>
             
<script type="text/javascript">
$('form').submit(function() {
	$('.btn').attr('disabled', true).addClass('disabled');
});

$(document).ready(function(){
	$("#gc_tabs").tabs();
	
	if($('#gc_coupon_type').val() == 'shipping')
	{
		$('#gc_coupon_price_fields').hide();
	}
	
	$('#gc_coupon_type').bind('change keyup', function(){
		if($(this).val() == 'price')
		{
			$('#gc_coupon_price_fields').show();
		}
		else
		{
			$('#gc_coupon_price_fields').hide();
		}
	});
	
	if($('#gc_coupon_appliesto_fields').val() == '1')
	{
		$('#gc_coupon_products').hide();
	}
	
	$('#gc_coupon_appliesto_fields').bind('change keyup', function(){
		if($(this).val() == 0)
		{
			$('#gc_coupon_products').show();
		}
		else
		{
			$('#gc_coupon_products').hide();
		}
	});
});

</script>