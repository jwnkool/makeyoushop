<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo lang('slideshow') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('slideshow') ?></li>
                    </ol>
                </section>
              
                 <br /><a class="btn btn-warning" href="<?php echo site_url('backend_slides/add');?>"><i class="fa fa-picture-o"></i> <?php echo lang('add_slideshow');?></a>
    <!-- Main content -->
                <section class="content">
                
 					<div class="col-xs-12">
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-bordered">
                                     
                                        <tr>
                                            <th><?php echo lang('images');?></th>
                                            <th><?php echo lang('name');?></th>
                                            <th><?php echo lang('action');?></th>
                                        </tr>
                                        
										<?php if ($slides): ?>
                                                <?php foreach ($slides as $sld): ?>
                                               
                                        <tr> 
                                            <td><img src="<?php echo base_url().$sld['image']; ?>" width="100" height="40"/></td>
                                            <td><?php echo $sld['title']; ?></td>
                                            <td><a class="btn btn-sm btn-primary" href="<?php echo site_url('backend_slides/edit/' . $sld['id']) ?>"><?php echo lang('update');?></a>
												<a class="btn btn-sm btn-danger" href="<?php echo site_url('backend_slides/delete/' . $sld['id']) ?>" onclick="return confirm('Are you sure want to delete this?');"><?php echo lang('delete');?></a>
                                            </td>
                                        </tr>
                                        
                                        <?php endforeach; ?>
										<?php else: ?>
                                            <tr>
                                            	<td colspan="4"><div style="font-style:italic; font-size:12px"><?php echo lang('no_data');?></div></td>
                                            </tr>
                                    
                                    <?php endif; ?>
                                    </table>
                            </div><!-- /.box -->
                            <div class="box-footer clearfix">
                                    <?php echo $pagination ?>
                                </div>
                        </div>
                 
                </section><!-- /.content -->
