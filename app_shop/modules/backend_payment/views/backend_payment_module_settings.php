<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_payment');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('payment_settings_title') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('payment_settings_title') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
                        <div class="col-xs-12">
                            <?php echo form_open('backend_payment/settings/'. $module);?>
                                <fieldset>
                                    
                                    
                    
                    <?php
                    echo $form;
                    ?>
                    <hr />
                                    <div class="form-actions">
                                        <input class="btn btn-primary" type="submit" value="<?php echo lang('save');?>"/>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        
					</div><!-- /.row -->
             </section>