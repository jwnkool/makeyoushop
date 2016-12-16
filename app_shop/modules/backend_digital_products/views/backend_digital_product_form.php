<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_digital_products');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('digital_products_form') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('digital_products_form') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<?php 
                    echo form_open_multipart('backend_digital_products/form/'.$id); ?>
                    <div class="row">
                    
                        <div class="col-xs-12">
                            <?php if($id==0) : ?>
                                <label for="file"><?php echo lang('file_label');?> </label>
                                <?php 	$data = array('id'=>'file', 'name'=>'userfile');
                                        echo form_upload($data);
                                ?>
                            <?php else : ?>
                                <label for="file"><?php echo lang('file_label');?> </label>
                                <?php echo $filename ?>
                            <?php endif; ?>
                            
                            <label for="title"><?php echo lang('title');?> </label>
                            <?php
                            $data	= array('id'=>'title', 'name'=>'title', 'value'=>set_value('title', $title), 'class'=>'form-control');
                            echo form_input($data);
                            ?>
                    
                            <label for="title"><?php echo lang('max_downloads');?> </label>
                            <?php
                            $data	= array('id'=>'max_downloads', 'name'=>'max_downloads', 'value'=>set_value('max_downloads', $max_downloads), 'class'=>'form-control');
                            echo form_input($data);
                            ?>
                            <span class="help-inline"><?php echo lang('max_downloads_note');?></span>
                            
                        </div>
                        <div class="col-xs-4 alert alert-warning">
                            <?php echo sprintf(lang('file_size_warning'), ini_get('post_max_size'), ini_get('upload_max_filesize')); ?>
                        </div>
                    
                    </div>
                        <hr />
                        <div class="form-actions">
                            <input class="btn btn-primary" type="submit" value="<?php echo lang('save');?>"/>
                        </div>
                    
                    </form>

					</div><!-- /.row -->
             </section>
