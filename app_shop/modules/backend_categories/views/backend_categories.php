<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo lang('categories') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('categories') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<script type="text/javascript">
                    function areyousure()
                    {
                        return confirm('<?php echo lang('confirm_delete_category');?>');
                    }
                    </script>
                    
                    <div style="text-align:right">
                        <a class="btn btn-warning" href="<?php echo site_url('backend_categories/form'); ?>"><i class="fa fa-folder-open"></i> <?php echo lang('add_new_category');?></a>
                    </div>
                    <br />
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo lang('category_id');?></th>
                                <th><?php echo lang('name')?></th>
                                <th><?php echo lang('enabled');?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo (count($categories) < 1)?'<tr><td style="text-align:center;" colspan="4">'.lang('no_categories').'</td></tr>':''?>
                            <?php
                            function list_categories($parent_id, $cats, $sub='') {
                                
                                foreach ($cats[$parent_id] as $cat):?>
                                <tr>
                                    <td><?php echo  $cat->id; ?></td>
                                    <td><?php echo  $sub.$cat->name; ?></td>
                                    <td><?php echo ($cat->enabled == '1') ? lang('enabled') : lang('disabled'); ?></td>
                                    <td>
                                        <div class="btn-group" style="float:right">
                    
                                            <a class="btn btn-info btn-sm" href="<?php echo  site_url('backend_categories/form/'.$cat->id);?>"><i class="fa fa-edit"></i> <?php echo lang('edit');?></a>
                    
                                            <a class="btn btn-success btn-sm" href="<?php echo  site_url('backend_categories/organize/'.$cat->id);?>"><i class="fa fa-crosshairs"></i> <?php echo lang('organize');?></a>
                                            
                                            <a class="btn btn-danger btn-sm" href="<?php echo  site_url('backend_categories/delete/'.$cat->id);?>" onclick="return areyousure();"><i class="fa fa-trash-o"></i> <?php echo lang('delete');?></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                if (isset($cats[$cat->id]) && sizeof($cats[$cat->id]) > 0)
                                {
                                    $sub2 = str_replace('&rarr;&nbsp;', '&nbsp;', $sub);
                                        $sub2 .=  '&nbsp;&nbsp;&nbsp;&rarr;&nbsp;';
                                    list_categories($cat->id, $cats, $sub2);
                                }
                                endforeach;
                            }
                            
                            if(isset($categories[0]))
                            {
                                list_categories(0, $categories);
                            }
                            
                            ?>
                        </tbody>
                    </table>
					</div><!-- /.row -->
             </section>