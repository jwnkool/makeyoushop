<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_locations');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('country_form') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('country_form') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<?php echo form_open('backend_locations/country_form/'.$id); ?>
                    
                    <fieldset>
                        
                            <label for="name"><?php echo lang('name');?></label>
                            <?php
                            $data	= array('name'=>'name', 'value'=>set_value('name', $name), 'class'=>'form-control');
                            echo form_input($data);
                            ?>
                            
                            <label for="iso_code_2"><?php echo lang('iso_code_2');?> / <?php echo lang('iso_code_3');?></label>
                            <?php
                            $data	= array( 'name'=>'iso_code_2', 'maxlength'=>'2', 'value'=>set_value('iso_code_2', $iso_code_2), 'class'=>'form-control');
                            echo form_input($data);
                            ?><br />
                            <?php
                            $data	= array('name'=>'iso_code_3', 'maxlength'=>'3', 'value'=>set_value('iso_code_3', $iso_code_3), 'class'=>'form-control');
                            echo form_input($data);
                            ?>
                            
                    
                            <label for="address_format"><?php echo lang('address_format');?></label>
                            <?php
                            $data	= array('name'=>'address_format', 'value'=>set_value('address_format', $address_format), 'rows'=>6, 'class'=>'form-control');
                            echo form_textarea($data);
                            ?>
                    		<br />
                            <?php $zip_required = array('name'=>'zip_required', 'value'=>1, 'checked'=>set_checkbox('zip_required', 1, (bool)$zip_required));?>
                            
							<?php echo form_checkbox($zip_required); ?> <?php echo lang('require_zip');?>
                            <br />
                            <label for="tax"><?php echo lang('tax');?></label>
                            <div class="input-append">
                                <?php
                                $data	= array('name'=>'tax', 'maxlength'=>'10', 'value'=>set_value('tax', $tax));
                                echo form_input($data);
                                ?>
                                <span class="add-on">%</span>
                            </div>
                    		<br />
                            <?php $status		= array('name'=>'status', 'value'=>1, 'checked'=>set_checkbox('status', 1, (bool)$status));?>
                            <?php echo form_checkbox($status); ?> <?php echo lang('enabled');?>
                        <hr />
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"><?php echo lang('save');?></button>
                        </div>
                        </form>

					</div><!-- /.row -->
             </section>
             
<script type="text/javascript">
$('form').submit(function() {
	$('.btn').attr('disabled', true).addClass('disabled');
});
</script>