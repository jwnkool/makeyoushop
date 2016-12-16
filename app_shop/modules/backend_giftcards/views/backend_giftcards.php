<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo lang('giftcards') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('giftcards') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<script type="text/javascript">
                    function areyousure()
                    {
                        return confirm('<?php echo lang('confirm_delete_giftcard');?>');
                    }
                    </script>
                    
                    <div class="btn-group" style="float:right">
                    
                    <?php if ($gift_cards['enabled']):?>
                    
                        <a class="btn btn-info" href="<?php echo site_url('backend_giftcards/form'); ?>"><i class="fa fa-briefcase"></i> <?php echo lang('add_giftcard')?></a>
                        
                        <a class="btn btn-success" href="<?php echo site_url('backend_giftcards/settings'); ?>"><i class="fa fa-cog"></i> <?php echo lang('settings');?></a>
                        
                        <a class="btn btn-primary" href="<?php echo site_url('backend_giftcards/disable'); ?>"><i class="fa fa-times-circle"></i> <?php echo lang('disable_giftcards');?></a>
                        
                    <?php else: ?>
                        <a class="btn btn-primary" href="<?php echo site_url('backend_giftcards/enable'); ?>"><i class="fa fa-check-circle"></i> <?php echo lang('enable_giftcards');?></a>
                    <?php endif; ?>
                    </div>
                    <br /><br />
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo lang('code');?></th>
                                <th><?php echo lang('to');?></th>
                                <th><?php echo lang('from');?></th>
                                <th><?php echo lang('total');?></th>
                                <th><?php echo lang('used');?></th>
                                <th><?php echo lang('remaining');?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo (count($cards) < 1)?'<tr><td style="text-align:center;" colspan="7">'.lang('no_giftcards').'</td></tr>':''?>
                    <?php foreach ($cards as $card):?>
                            <tr>
                                <td><?php echo  $card['code']; ?></td>
                                <td><?php echo  $card['to_name']; ?></td>
                                <td><?php echo  $card['from']; ?></td>
                                <td><?php echo (float) $card['beginning_amount'];?></td>
                                <td><?php echo (float) $card['amount_used']; ?></td>
                                <td><?php echo (float) $card['beginning_amount'] - (float) $card['amount_used']; ?></td>
                                <td>
                                    <a class="btn btn-danger btn-sm" style="float:right;" href="<?php echo site_url('backend_giftcards/delete/'.$card['id']); ?>" onclick="return areyousure();"><i class="fa fa-trash-o"></i> <?php echo lang('delete');?></a>
                          </tr>
                    <?php endforeach; ?>
                        </tbody>
                    </table>

					</div><!-- /.row -->
             </section>