<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_giftcards');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('add_giftcard') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('add_giftcard') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<?php echo form_open('backend_giftcards/form/'); ?>
                    	
                    <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="to_name"><?php echo lang('recipient_name');?> </label>
                                    <?php
                                    $data	= array('name'=>'to_name', 'value'=>set_value('code'), 'class'=>'form-control');
                                    echo form_input($data);
                                    ?>
                                </div>
                                <div class="col-xs-6">
                                    <label for="to_email"><?php echo lang('recipient_email');?></label>
                                    <?php
                                    $data	= array('name'=>'to_email', 'value'=>set_value('to_email'), 'class'=>'form-control');
                                    echo form_input($data);
                                    ?>
                    			</div>
                    		</div>
                    </div>
                    <div class="col-xs-12">
                                <div class="col-xs-4">
                                    <label class="checkbox">
                                    <?php
                                    $data	= array('name'=>'send_notification', 'value'=>'true');
                                    echo form_checkbox($data);
                                    ?>
                                    <?php echo lang('send_notification');?></label>
                    			</div>
                    </div>
                    <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="sender_name"><?php echo lang('sender_name');?></label>
                                    <?php
                                    $data	= array('name'=>'from', 'value'=>set_value('from'), 'class'=>'form-control');
                                    echo form_input($data);
                                    ?>
                                
                                    <label for="personal_message"><?php echo lang('personal_message');?></label>
                                    <?php
                                    $data	= array('name'=>'personal_message', 'value'=>set_value('personal_message'), 'class'=>'redactor');
                                    echo form_textarea($data);
                                    ?>
                                
                                    <label for="beginning_amount"><?php echo lang('amount');?></label>
                                    <?php
                                    $data	= array('name'=>'beginning_amount', 'value'=>set_value('beginning_amount'), 'class'=>'form-control');
                                    echo form_input($data);
                                    ?>
                                    <hr />
                                    <div class="form-actions">
                                        <input class="btn btn-primary" type="submit" value="<?php echo lang('save');?>"/>
                                    </div>
                        		</div>
                      		</div>
                    </div>  
                    </form>
					</div><!-- /.row -->
             </section>