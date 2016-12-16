<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo lang('customer_groups') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('customer_groups') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<script type="text/javascript">
                    function areyousure()
                    {
                        return confirm('<?php echo lang('confirm_delete_group');?>');
                    }
                    
                    </script>
                    
                    <a class="btn btn-info" style="float:right;" href="<?php echo site_url('backend_customers/edit_group'); ?>"><i class="fa fa-group"></i> <?php echo lang('add_new_group');?></a>
                     <br /><br />   
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo lang('group_name');?></th>
                                <th><?php echo lang('discount');?></th>
                                <th><?php echo lang('discount_type');?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php foreach ($groups as $group):?>
                        <tr>
                            <td><?php echo $group->name;?></td>
                            <td><?php echo $group->discount ?></td>
                            <td><?php echo $group->discount_type ?></td>
                            <td>
                                <div class="btn-group" style="float:right;">
                    
                                    <a class="btn btn-primary" href="<?php echo site_url('backend_customers/edit_group/'.$group->id); ?>"><i class="fa fa-edit"></i> <?php echo lang('edit');?></a>
                                    
                                    <?php if($group->id != 1) : ?>
                                    <a class="btn btn-danger" href="<?php echo site_url('backend_customers/delete_group/'.$group->id); ?>" onclick="return areyousure();"><i class="fa fa-trash-o"></i> <?php echo lang('delete');?></a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
					</div><!-- /.row -->
             </section>