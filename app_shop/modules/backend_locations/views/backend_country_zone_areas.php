<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_locations');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('zone_areas_for') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('zone_areas_for') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<script type="text/javascript">
                    function areyousure()
                    {
                        return confirm('<?php echo lang('confirm_delete_zone_area');?>');
                    }
                    </script>
                    
                    <div class="btn-group" style="float:right;">
                        <a class="btn btn-warning" href="<?php echo site_url('backend_locations/zone_area_form/'.$zone->id);?>"><i class="fa fa-flag-o"></i> <?php echo lang('add_new_zone_area');?></a>
                        <a class="btn btn-info" href="<?php echo site_url('backend_locations/country_form'); ?>"><i class="fa fa-flag-checkered"></i> <?php echo lang('add_new_country');?></a>
                        <a class="btn btn-success" href="<?php echo site_url('backend_locations/zone_form'); ?>"><i class="fa fa-flag"></i> <?php echo lang('add_new_zone');?></a>
                    </div>
                    
                    <table class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th><?php echo lang('code');?></th>
                                <th><?php echo lang('tax');?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php foreach ($areas as $location):?>
                            <tr>
                                <td><?php echo  $location->code; ?></td>
                                <td><?php echo $location->tax+0;?>%</td>
                                <td>
                                    <div class="btn-group" style="float:right;">
                                        <a class="btn btn-info btn-sm" href="<?php echo  site_url('backend_locations/zone_area_form/'.$zone->id.'/'.$location->id); ?>"><i class="fa fa-edit"></i> <?php echo lang('edit');?></a>
                                        <a class="btn btn-danger btn-sm" href="<?php echo  site_url('backend_locations/delete_zone_area/'.$location->id); ?>" onclick="return areyousure();"><i class="fa fa-trash-o"></i> <?php echo lang('delete');?></a>
                                    </div>
                                </td>
                          </tr>
                    <?php endforeach; ?>
                    <?php if(count($areas) == 0):?>
                            <tr>
                                <td colspan="2">
                                    <?php echo lang('no_zone_areas');?>
                                <td>
                            </tr>
                    <?php endif;?>
                        </tbody>
                    </table>
					</div><!-- /.row -->
             </section>