<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_pages');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('link_form') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('link_form') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<?php echo form_open('backend_pages/link_form/'.$id); ?>
                    
                        <label for="menu_title"><?php echo lang('title');?> </label>
                        <?php
                        $data	= array('id'=>'title', 'name'=>'title', 'value'=>set_value('title', $title), 'class'=>'form-control');
                        echo form_input($data);
                        ?>
                    
                        <label for="url"><?php echo lang('url');?></label>
                        <?php
                        $data	= array('id'=>'url', 'name'=>'url', 'value'=>set_value('url', $url), 'class'=>'form-control'); 
                        echo form_input($data);
                        ?>
                        <span class="help-inline"><?php echo lang('url_example');?></span>
                    	<hr />
                        <label for="sequence"><?php echo lang('parent_id');?></label>
                        <?php
                        $options	= array();
                        $options[0]	= lang('top_level');
                        function page_loop($pages, $dash = '', $id=0)
                        {
                            $options	= array();
                            foreach($pages as $page)
                            {
                                //this is to stop the whole tree of a particular link from showing up while editing it
                                if($id != $page->id)
                                {
                                    $options[$page->id]	= $dash.' '.$page->title;
                                    $options			= $options + page_loop($page->children, $dash.'-', $id);
                                }
                            }
                            return $options;
                        }
                        $options	= $options + page_loop($pages, '', $id);
                        echo form_dropdown('parent_id', $options,  set_value('parent_id', $parent_id), 'class="form-control"');
                        ?>
                    	<hr />
                        <label for="sequence"><?php echo lang('sequence');?></label>
                        <?php
                        $data	= array('id'=>'sequence', 'name'=>'sequence', 'class'=>'form-control' ,'value'=>set_value('sequence', $sequence));
                        echo form_input($data);
                        ?>
                    	<br />
                        <?php
                        $data	= array('name'=>'new_window', 'value'=>'1', 'checked'=>(bool)$new_window);
                        echo form_checkbox($data);
                        ?>
                        <?php echo lang('open_in_new_window');?>
                    	<hr />
                        <div class="form-actions">
                            <input class="btn btn-primary" type="submit" value="<?php echo lang('save');?>"/>
                        </div>
                    </form>
					</div><!-- /.row -->
             </section>