<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_customers');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('customer_form') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('customer_form') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
						<?php echo form_open('backend_customers/form/'.$id); ?>
                        
                         <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label><?php echo lang('company');?></label>
                                    <?php
                                    $data	= array('name'=>'company', 'value'=>set_value('company', $company), 'class'=>'form-control');
                                    echo form_input($data); ?>
                                </div>
                            </div>
                          </div>
                          
                         <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label><?php echo lang('firstname');?></label>
                                    <?php
                                    $data	= array('name'=>'firstname', 'value'=>set_value('firstname', $firstname), 'class'=>'form-control');
                                    echo form_input($data); ?>
                                </div>
                                <div class="col-xs-6">
                                    <label><?php echo lang('lastname');?></label>
                                    <?php
                                    $data	= array('name'=>'lastname', 'value'=>set_value('lastname', $lastname), 'class'=>'form-control');
                                    echo form_input($data); ?>
                                </div>
                            </div>
                          </div>
                        
                         <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label><?php echo lang('email');?></label>
                                    <?php
                                    $data	= array('name'=>'email', 'value'=>set_value('email', $email), 'class'=>'form-control');
                                    echo form_input($data); ?>
                                </div>
                                <div class="col-xs-6">
                                    <label><?php echo lang('phone');?></label>
                                    <?php
                                    $data	= array('name'=>'phone', 'value'=>set_value('phone', $phone), 'class'=>'form-control');
                                    echo form_input($data); ?>
                                </div>
                             </div>
                          </div>
                          
                          <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label><?php echo lang('password');?></label>
                                    <?php
                                    $data	= array('name'=>'password', 'class'=>'form-control');
                                    echo form_password($data); ?>
                                </div>
                                <div class="col-xs-6">
                                    <label><?php echo lang('confirm');?></label>
                                    <?php
                                    $data	= array('name'=>'confirm', 'class'=>'form-control');
                                    echo form_password($data); ?>
                                </div>
                            </div>
                          </div>
                          
                          <div class="col-xs-12">
                                <div class="col-xs-4">
                                    <label class="checkbox"></label>
                                    <?php $data	= array('name'=>'email_subscribe', 'value'=>1, 'checked'=>(bool)$email_subscribe);
                                    echo form_checkbox($data).' '.lang('email_subscribed'); ?>
                                </div>
                            
                                <div class="col-xs-4">
                                    <label class="checkbox"></label>
                                        <?php
                                        $data	= array('name'=>'active', 'value'=>1, 'checked'=>$active);
                                        echo form_checkbox($data).' '.lang('active'); ?>
                                </div>
                           </div>
                           
                          <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label><?php echo lang('group');?></label>
                                    <?php echo form_dropdown('group_id', $group_list, set_value('group_id',$group_id), 'class="form-control"'); ?>
                                </div>
                            </div>
                            <hr />
                            <input class="btn btn-primary" type="submit" value="<?php echo lang('save');?>"/>
                          </div>
                        </form>
					</div><!-- /.row -->
             </section>