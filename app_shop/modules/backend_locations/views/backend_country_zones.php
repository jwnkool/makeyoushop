<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_locations');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('zone_areas') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('zone_areas') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<script type="text/javascript">
                    function areyousure()
                    {
                        return confirm('<?php echo lang('confirm_delete_zone');?>');
                    }
                    </script>
                  
                    <div class="btn-group" style="float:right;">
                        <a class="btn btn-info" href="<?php echo site_url('backend_locations/country_form'); ?>"><i class="fa fa-flag-checkered"></i> <?php echo lang('add_new_country');?></a>
                        <a class="btn btn-success" href="<?php echo site_url('backend_locations/zone_form'); ?>"><i class="fa fa-flag"></i> <?php echo lang('add_new_zone');?></a>
                    </div>
					<br /><br />
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><?php echo lang('name');?></th>
                                <th><?php echo lang('code');?></th>
                                <th><?php echo lang('tax');?></th>
                                <th><?php echo lang('status');?></th>
                                <th class="gc_cell_right"></th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php foreach ($zones as $location):?>
                            <tr>
                                <td class="gc_cell_left"><?php echo  $location->name; ?></td>
                                <td><?php echo $location->code;?></td>
                                <td><?php echo $location->tax+0;?>%</td>
                                <td><?php echo ((bool)$location->status)?'enabled':'disabled';?></td>
                                <td>
                                    <div class="btn-group" style="float:right;">
                                        <a class="btn btn-success btn-sm" href="<?php echo site_url('backend_locations/zone_form/'.$location->id); ?>"><i class="fa fa-edit"></i> <?php echo lang('edit');?></a>
                                        <a class="btn btn-primary btn-sm" href="<?php echo site_url('backend_locations/zone_areas/'.$location->id); ?>"><i class="fa fa-star"></i> <?php echo lang('zone_areas');?></a>
                                        <a class="btn btn-danger btn-sm" href="<?php echo site_url('backend_locations/delete_zone/'.$location->id); ?>" onclick="return areyousure();"><i class="icon-trash icon-white"></i> <?php echo lang('delete');?></a>
                                    </div>
                                </td>
                          </tr>
                    <?php endforeach; ?>
                        </tbody>
                    </table>
					</div><!-- /.row -->
             </section>