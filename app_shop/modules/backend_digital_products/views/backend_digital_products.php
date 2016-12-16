<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo lang('dgtl_pr_header') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('dgtl_pr_header') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<script type="text/javascript">
                    function areyousure()
                    {
                        return confirm('<?php echo lang('confirm_delete_file');?>');
                    }
                    </script>
                    
                    <a class="btn btn-warning btn-sm" style="float:right;" href="<?php echo site_url('backend_digital_products/form');?>"><i class="fa fa-cloud-download"></i> <?php echo lang('add_file');?></a>
                    
                    
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th><?php echo lang('filename');?></th>
                                    <th><?php echo lang('title');?></th>
                                    <th><?php echo lang('size');?></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php echo (count($file_list) < 1)?'<tr><td style="text-align:center;" colspan="4">'.lang('no_files').'</td></tr>':''?>
                            <?php foreach ($file_list as $file):?>
                                <tr>
                                    <td><?php echo $file->filename; ?></td>
                                    <td><?php echo $file->title; ?></td>
                                    <td><?php echo $file->size; ?> kb</td>
                                    <td>
                                        <div class="btn-group" style="float:right">
                                            <a class="btn btn-info btn-sm" href="<?php echo  site_url('backend_digital_products/form/'.$file->id);?>"><i class="fa fa-edit"></i> <?php echo lang('edit');?></a>
                                            
                                            <a class="btn btn-danger btn-sm" href="<?php echo  site_url('backend_digital_products/delete/'.$file->id);?>" onclick="return areyousure();"><i class="fa fa-trash-o"></i> <?php echo lang('delete');?></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                    </table>
					</div><!-- /.row -->
             </section>