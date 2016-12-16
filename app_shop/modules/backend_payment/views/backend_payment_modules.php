<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo lang('payment_modules') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('payment_modules') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<?php if(count($payment_modules) >0): ?>
                        <table class="table table-bordered">
                            <tbody>
                            <?php foreach($payment_modules as $module=>$enabled): ?>
                                <tr>
                                    <td><?php echo humanize($module); ?></td>
                                    <td>
                                        <span class="btn-group pull-right">
                                    <?php if($enabled): ?>
                                        <a class="btn btn-default btn-sm" href="<?php echo site_url('backend_payment/settings/'.$module);?>"><i class="fa fa-credit-card"></i> <?php echo lang('settings');?></a>
                                        <a class="btn btn-danger btn-sm" href="<?php echo site_url('backend_payment/uninstall/'.$module);?>" onclick="return areyousure();"><i class="fa fa-minus-square"></i> <?php echo lang('uninstall');?></a>
                                    <?php else: ?>
                                        <a class="btn btn-warning btn-sm" href="<?php echo site_url('backend_payment/install/'.$module);?>"><i class="fa fa-check-square"></i> <?php echo lang('install');?></a>
                                    <?php endif; ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                    
					</div><!-- /.row -->
             </section>