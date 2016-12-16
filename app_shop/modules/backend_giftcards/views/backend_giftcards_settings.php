<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_giftcards');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('giftcard_settings') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('giftcard_settings') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<?php echo form_open('backend_giftcards/settings'); ?>
                    
                    <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="predefined_card_amounts"><?php echo lang('predefined_card_amounts');?></label>
                                    <?php 
                                    $data	= array('name'=>'predefined_card_amounts', 'value'=>set_value('predefined_card_amounts', $predefined_card_amounts), 'class'=>'gc_tf1 form-control');
                                    echo form_input($data);
                                     ?>
                                    <span class="help-inline"><?php echo lang('predefined_examples');?></span>
                                </div>
                             </div>
                                <div class="col-xs-12">
                                    <label class="checkbox">
                                    <?php
                                    $data	= array('name'=>'allow_custom_amount', 'value'=>'1', 'checked'=>(bool)$allow_custom_amount);
                                    echo form_checkbox($data);
                                    ?>
                                    <?php echo lang('allow_custom_amounts');?></label>
                               </div>
                                <div class="form-actions">
                                    <input class="btn btn-primary" type="submit" value="<?php echo lang('save');?>"/>
                                </div>
                     </div>
                    </form>
                    
					</div><!-- /.row -->
             </section>