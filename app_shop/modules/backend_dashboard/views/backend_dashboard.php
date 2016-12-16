<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo lang('dashboard') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('dashboard') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">

                <!-- Small boxes (Stat box) -->
                    <div class="row">
                    
                        <!--Shipment & Payement module installed -->
                        <?php if(!$payment_module_installed):?>
                        	<div class="alert alert-info alert-dismissable">
                                 <i class="fa fa-info"></i>
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                 <b><?php echo lang('common_note') ?>:</b> <?php echo lang('no_payment_module_installed'); ?>
                             </div>
                        <?php endif;?>
                        
                        <?php if(!$shipping_module_installed):?>
                        	<div class="alert alert-info alert-dismissable">
                                 <i class="fa fa-info"></i>
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                 <b><?php echo lang('common_note') ?>:</b> <?php echo lang('no_shipping_module_installed'); ?>
                             </div>
                        <?php endif;?>
                        <!--Shipment & Payement module installed -->
                        
                        <!-- Data view recent order -->
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo lang('recent_orders') ?></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th><?php echo lang('order_number') ?></th>
                                            <th><?php echo lang('bill_to') ?></th>
                                            <th><?php echo lang('ship_to') ?></th>
                                            <th><?php echo lang('ordered_on') ?></th>
                                            <th><?php echo lang('status') ?></th>
                                        </tr>
									<?php foreach($orders as $order): ?>
                                        <tr>
                                            <td  class="gc_cell_left"><a href="<?php echo site_url('backend_orders/order/'.$order->id); ?>"><?php echo $order->order_number; ?></a></td>
                                            <td><?php echo $order->bill_lastname.', '.$order->bill_firstname; ?></td>
                                            <td><?php echo $order->ship_lastname.', '.$order->ship_firstname; ?></td>
                                            <td><?php echo format_date($order->ordered_on); ?></td>
                                            <td><code><?php echo $order->status ?></code></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </table>
                                </div><!-- /.box-body -->
                                <div class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <li><a href="<?php echo site_url('backend_orders');?>"><?php echo lang('view_all_orders');?></a></li>
                                    </ul>
                                </div>
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                        <!-- Data view recent order -->
                        
                        <!-- Data view recent customer register -->
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo lang('recent_customers') ?></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th><?php echo lang('firstname') ?></th>
                                            <th><?php echo lang('lastname') ?></th>
                                            <th><?php echo lang('email') ?></th>
                                            <th><?php echo lang('active') ?></th>
                                        </tr>
									<?php foreach ($customers as $customer):?>
                                        <tr>
                                            <td class="gc_cell_left"><?php echo  $customer->firstname; ?></td>
                                            <td><?php echo  $customer->lastname; ?></td>
                                            <td><a href="mailto:<?php echo  $customer->email;?>"><?php echo  $customer->email; ?></a></td>
                                            <td>
                                                <?php if($customer->active == 1)
                                                {
                                                    echo lang('yes');
                                                }
                                                else
                                                {
                                                    echo lang('no');
                                                }
                                                ?>
                                            </td>
                                        
                                        </tr>
                                <?php endforeach; ?>
                                    </table>
                                </div><!-- /.box-body -->
                                <div class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <li><a class="btn btn-large" href="<?php echo site_url('backend_customers');?>"><?php echo lang('view_all_customers');?></a></li>
                                    </ul>
                                </div>
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                        <!-- Data view recent customer register -->

                        
                    </div><!-- /.row -->
                    
             </section>

