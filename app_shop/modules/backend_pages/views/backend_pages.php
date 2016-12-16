<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo lang('pages') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('pages') ?></li>
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
                    <div class="btn-group pull-right">
                        <a class="btn btn-warning" href="<?php echo site_url('backend_pages/form'); ?>"><i class="fa fa-clipboard"></i> <?php echo lang('add_new_page');?></a>
                        <a class="btn btn-info" href="<?php echo site_url('backend_pages/link_form'); ?>"><i class="fa fa-chain"></i> <?php echo lang('add_new_link');?></a>
                    </div>
                    <br /><br />
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo lang('title');?></th>
                                <th></th>
                            </tr>
                        </thead>
                        
                        <?php echo (count($pages) < 1)?'<tr><td style="text-align:center;" colspan="2">'.lang('no_pages_or_links').'</td></tr>':''?>
                        <?php if($pages):?>
                        <tbody>
                            
                            <?php
                            function page_loop($pages, $dash = '')
                            {
                                foreach($pages as $page)
                                {?>
                                <tr class="gc_row">
                                    <td>
                                        <?php echo $dash.' '.$page->title; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group pull-right">
                                            <?php if(!empty($page->url)): ?>
                                                <a class="btn btn-info btn-sm" href="<?php echo site_url('backend_pages/link_form/'.$page->id); ?>"><i class="fa fa-edit"></i> <?php echo lang('edit');?></a>
                                                <a class="btn btn btn-info btn-sm" href="<?php echo $page->url;?>" target="_blank"><i class="icon-play-circle"></i> <?php echo lang('follow_link');?></a>
                                            <?php else: ?>
                                                <a class="btn btn-info btn-sm" href="<?php echo site_url('backend_pages/form/'.$page->id); ?>"><i class="fa fa-edit"></i> <?php echo lang('edit');?></a>
                                                <a class="btn btn-primary btn-sm" href="<?php echo site_url($page->slug); ?>" target="_blank"><i class="fa fa-chain-broken"></i> <?php echo lang('go_to_page');?></a>
                                            <?php endif; ?>
                                            <a class="btn btn-sm btn-danger" href="<?php echo site_url('backend_pages/delete/'.$page->id); ?>" onclick="return areyousure();"><i class="fa fa-trash-o"></i> <?php echo lang('delete');?></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                page_loop($page->children, $dash.'-');
                                }
                            }
                            page_loop($pages);
                            ?>
                        </tbody>
                        <?php endif;?>
                    </table>
					</div><!-- /.row -->
             </section>