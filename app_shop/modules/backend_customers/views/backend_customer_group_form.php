<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo lang('customer_group_form') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('customer_group_form') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<?php 
                    $f_name				= form_input('name', set_value('name', $name), 'class="form-control"');
                    $f_discount			= form_input('discount', set_value('discount', $discount), 'class="form-control"');
                    $f_discount_type	= form_dropdown('discount_type', array('percent'=>'percent','fixed'=>'fixed'), set_value('discount_type', $discount_type), 'class="form-control"');
                    
                    echo form_open('backend_customers/edit_group/'.$id); 
                    
                    ?>
                    <label><?php echo lang('group_name');?></label>
                    <?php echo $f_name; ?>
                        
                    <label><?php echo lang('discount');?></label>
                    <?php echo $f_discount ?>
                    
                    <label><?php echo lang('discount_type');?></label>
                    <?php echo $f_discount_type  ?>
                    
                    <hr />
                        <input class="btn btn-primary" type="submit" value="<?php echo lang('save');?>"/>
                    
                    </form>
					</div><!-- /.row -->
             </section>
