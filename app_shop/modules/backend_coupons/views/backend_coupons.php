<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo lang('coupons') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('coupons') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<script type="text/javascript">
                    function areyousure()
                    {
                        return confirm('<?php echo lang('confirm_delete_coupon');?>');
                    }
                    </script>
                    
                        <a class="btn btn-warning" style="float:right;" href="<?php echo site_url('backend_coupons/form'); ?>"><i class="fa fa-scissors"></i> <?php echo lang('add_new_coupon');?></a>
                    <br /><br />
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                              <th><?php echo lang('code');?></th>
                              <th><?php echo lang('usage');?></th>
                              <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php echo (count($coupons) < 1)?'<tr><td style="text-align:center;" colspan="3">'.lang('no_coupons').'</td></tr>':''?>
                    <?php foreach ($coupons as $coupon):?>
                            <tr>
                                <td><?php echo  $coupon->code; ?></td>
                                <td>
                                  <?php echo  $coupon->num_uses ." / ". $coupon->max_uses; ?>
                                </td>
                                <td>
                                    <div class="btn-group" style="float:right;">
                                        <a class="btn btn-info btn-sm" href="<?php echo site_url('backend_coupons/form/'.$coupon->id); ?>"><i class="fa fa-edit"></i> <?php echo lang('edit');?></a>
                                        <a class="btn btn-danger btn-sm" href="<?php echo site_url('backend_coupons/delete/'.$coupon->id); ?>" onclick="return areyousure();"><i class="icon-trash icon-white"></i> <?php echo lang('delete');?></a>
                                    </div>
                                </td>
                          </tr>
                    <?php endforeach; ?>
                        </tbody>
                    </table>
					</div><!-- /.row -->
             </section>