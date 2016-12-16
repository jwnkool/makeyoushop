<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo lang('admins') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('admins') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<script type="text/javascript">
                    function areyousure()
                    {
                        return confirm('<?php echo lang('confirm_delete');?>');
                    }
                    </script>
                    
                    <div style="text-align:right;">
                        <a class="btn btn-warning" href="<?php echo site_url('backend_admin/form'); ?>"><i class="fa fa-users"></i> <?php echo lang('add_new_admin');?></a>
                    </div>
                    <br /><br />
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo lang('firstname');?></th>
                                <th><?php echo lang('lastname');?></th>
                                <th><?php echo lang('email');?></th>
                                <th><?php echo lang('username');?></th>
                                <th><?php echo lang('access');?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php foreach ($admins as $admin):?>
                            <tr>
                                <td><?php echo $admin->firstname; ?></td>
                                <td><?php echo $admin->lastname; ?></td>
                                <td><a href="mailto:<?php echo $admin->email;?>"><?php echo $admin->email; ?></a></td>
                                <td><?php echo $admin->username; ?></td>
                                <td><?php echo $admin->access; ?></td>
                                <td>
                                    <div class="btn-group" style="float:right;">
                                        <a class="btn btn-info btn-sm" href="<?php echo site_url('backend_admin/form/'.$admin->id);?>"><i class="fa fa-edit"></i> <?php echo lang('edit');?></a>	
                                        <?php
                                        $current_admin	= $this->session->userdata('admin');
                                        $margin			= 30;
                                        if ($current_admin['id'] != $admin->id): ?>
                                        <a class="btn btn-danger btn-sm" href="<?php echo site_url('backend_admin/delete/'.$admin->id); ?>" onclick="return areyousure();"><i class="fa fa-trash-o"></i> <?php echo lang('delete');?></a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                        </tbody>
                    </table>
					</div><!-- /.row -->
             </section>