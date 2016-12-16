<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_locations');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('zone_form') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('zone_form') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<?php echo form_open('backend_locations/zone_form/'.$id); ?>
                    
                        <label for="country_id"><?php echo lang('country');?></label>
                        <?php
                        
                        $country_ids	= array();
                        foreach($countries as $c)
                        {
                            $country_ids[$c->id] = $c->name;
                        }
                        
                        ?>
                        <?php echo form_dropdown('country_id', $country_ids, set_value('country_id', $country_id) ,'class="form-control"');?>
                    
                        <label for="name"><?php echo lang('name');?></label>
                        <?php
                        $data	= array('id'=>'name', 'name'=>'name', 'value'=>set_value('name', $name), 'class'=>'form-control');
                        echo form_input($data);
                        ?>
                        
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
                        
                        <?php $status		= array('name'=>'status', 'value'=>1, 'checked'=>set_checkbox('status', 1, (bool)$status));?>
                        <br />
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