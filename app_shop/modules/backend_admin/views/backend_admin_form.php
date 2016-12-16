<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_admin');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('admin_form') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('admin_form') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<?php echo form_open('backend_admin/form/'.$id); ?>
                        
                            <label><?php echo lang('firstname');?></label>
                            <?php
                            $data	= array('name'=>'firstname', 'value'=>set_value('firstname', $firstname), 'class'=>'form-control');
                            echo form_input($data);
                            ?>
                            
                            <label><?php echo lang('lastname');?></label>
                            <?php
                            $data	= array('name'=>'lastname', 'value'=>set_value('lastname', $lastname), 'class'=>'form-control');
                            echo form_input($data);
                            ?>
                    
                            <label><?php echo lang('username');?></label>
                            <?php
                            $data	= array('name'=>'username', 'value'=>set_value('username', $username), 'class'=>'form-control');
                            echo form_input($data);
                            ?>
                    
                            <label><?php echo lang('email');?></label>
                            <?php
                            $data	= array('name'=>'email', 'value'=>set_value('email', $email), 'class'=>'form-control');
                            echo form_input($data);
                            ?>
                    
                            <label><?php echo lang('access');?></label>
                            <?php
                            $options = array(	'Admin'		=> 'Admin',
                                                'Orders'	=> 'Orders'
                                            );
                            echo form_dropdown('access', $options, set_value('phone', $access), 'class="form-control"');
                            ?>
                    
                            <label><?php echo lang('password');?></label>
                            <?php
                            $data	= array('name'=>'password', 'class'=>'form-control');
                            echo form_password($data);
                            ?>
                    
                            <label><?php echo lang('confirm_password');?></label>
                            <?php
                            $data	= array('name'=>'confirm', 'class'=>'form-control');
                            echo form_password($data);
                            ?>
                            <hr />
                            <div class="form-actions">
                                <input class="btn btn-primary" type="submit" value="<?php echo lang('save');?>"/>
                            </div>
                        
                    </form>
					</div><!-- /.row -->
             </section>
             
<script type="text/javascript">
$('form').submit(function() {
	$('.btn').attr('disabled', true).addClass('disabled');
});
</script>