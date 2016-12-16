<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_settings/canned_messages');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('canned_message_form') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('canned_message_form') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<?php echo form_open('backend_settings/canned_message_form/'.$id); ?>
                    
                        <label for="name"><?php echo lang('label_canned_name');?> </label>
                        <?php
                        $name_array = array('name' =>'name', 'class'=>'form-control', 'value'=>set_value('name', $name));
                    
                        if(!$deletable) {
                            $name_array['class']	= "form-control disabled";
                            $name_array['readonly']	= "readonly";
                        }
                        echo form_input($name_array);?>
                        
                        
                        <label for="subject"><?php echo lang('label_canned_subject');?> </label>
                        <?php echo form_input(array('name'=>'subject', 'class'=>'form-control', 'value'=>set_value('subject', $subject)));?>
                        
                        <label for="description"></label>
                        <?php
                        $data	= array('id'=>'description', 'name'=>'content_messages', 'class'=>'redactor', 'value'=>set_value('content_messages', $content_messages));
                        echo form_textarea($data);
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