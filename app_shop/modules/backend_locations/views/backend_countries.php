<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo lang('countries') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('countries') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<script type="text/javascript">
                    //<![CDATA[
                    $(document).ready(function(){
                        create_sortable();	
                    });
                    // Return a helper with preserved width of cells
                    var fixHelper = function(e, ui) {
                        ui.children().each(function() {
                            $(this).width($(this).width());
                        });
                        return ui;
                    };
                    function create_sortable()
                    {
                        $('#countries').sortable({
                            scroll: true,
                            helper: fixHelper,
                            axis: 'y',
                            handle:'.handle',
                            update: function(){
                                save_sortable();
                            }
                        });	
                        $('#countries').sortable('enable');
                    }
                    
                    function save_sortable()
                    {
                        serial=$('#countries').sortable('serialize');
                                
                        $.ajax({
                            url:'<?php echo site_url('backend_locations/organize_countries');?>',
                            type:'POST',
                            data:serial
                        });
                    }
                    function areyousure()
                    {
                        return confirm('<?php echo lang('confirm_delete_country');?>');
                    }
                    //]]>
                    </script>

                    <div class="btn-group" style="float:right;">
                        <a class="btn btn-warning" href="<?php echo site_url('backend_locations/country_form'); ?>"><i class="fa fa-flag-checkered"></i> <?php echo lang('add_new_country');?></a>
                        <a class="btn btn-success" href="<?php echo site_url('backend_locations/zone_form'); ?>"><i class="fa fa-flag"></i> <?php echo lang('add_new_zone');?></a>
                    </div>
					<br /><br />

                    <strong style="float:left;"><?php echo lang('sort_countries')?></strong>
                    
                    <table class="table table-bordered" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th><?php echo lang('sort');?></th>
                                <th><?php echo lang('name');?></th>
                                <th><?php echo lang('iso_code_2');?></th>
                                <th><?php echo lang('iso_code_3');?></th>
                                <th><?php echo lang('tax');?></th>
                                <th><?php echo lang('status');?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="countries">
                    <?php foreach ($locations as $location):?>
                            <tr id="country-<?php echo $location->id;?>">
                                <td class="handle"><a class="btn btn-sm btn-primary" style="cursor:move"><span class="fa fa-arrows"></span></a></td>
                                <td><?php echo  $location->name; ?></td>
                                <td><?php echo $location->iso_code_2;?></td>
                                <td><?php echo $location->iso_code_3;?></td>
                                <td><?php echo $location->tax+0;?>%</td>
                                <td><?php echo ((bool)$location->status)?'enabled':'disabled';?></td>
                                <td>
                                    <div class="btn-group" style="float:right;">
                                        <a class="btn btn-info btn-sm" href="<?php echo site_url('backend_locations/country_form/'.$location->id); ?>"><i class="fa fa-edit"></i> <?php echo lang('edit');?></a>
                                        <a class="btn btn-success btn-sm" href="<?php echo site_url('backend_locations/zones/'.$location->id); ?>"><i class="fa fa-star"></i> <?php echo lang('zones');?></a>
                                        <a class="btn btn-danger btn-sm" href="<?php echo site_url('backend_locations/delete_country/'.$location->id); ?>" onclick="return areyousure<();"><i class="fa fa-trash-o"></i> <?php echo lang('delete');?></a>
                                    </div>
                                </td>
                          </tr>
                    <?php endforeach; ?>
                        </tbody>
                    </table>
					</div><!-- /.row -->
             </section>