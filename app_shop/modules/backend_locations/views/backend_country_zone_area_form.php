<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_locations');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('zone_area_form') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('zone_area_form') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<?php echo form_open('backend_zone_area_form/'.$zone_id.'/'.$id); ?>
                    
                        <label for="code"><?php echo lang('code');?></label>
                        <?php
                        $data	= array( 'name'=>'code', 'value'=>set_value('code', $code), 'class'=>'form-control');
                        echo form_input($data);
                        ?>
                        
                        <label for="tax"><?php echo lang('tax');?>
                            <span class="add-on">%</span></label>
                        <div class="input-append">
                            <?php
                            $data	= array('name'=>'tax', 'maxlength'=>'10', 'value'=>set_value('tax', $tax), 'class'=>'form-control');
                            echo form_input($data);
                            ?>
                        </div>
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