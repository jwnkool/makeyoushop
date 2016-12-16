<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_slides');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('edit_slideshow') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('edit_slideshow') ?></li>
                    </ol>
                </section>
									
                 <!-- Main content -->
                <section class="content">
				
                    <div class='row'>
                        <div class='col-md-12'>
						<?php echo validation_errors(); ?>
							<?php echo form_open_multipart('backend_slides/edit'); ?>
                            	<?php echo form_hidden('id', $slides['id']); ?>
                        		 <form role="form">
                                   
                                <div class="form-group">
                                  	<label><?php echo lang('name');?></label>
                                    <input type="text" class="form-control" name="title" value="<?php echo set_value('title', isset($slides['title']) ? $slides['title'] : '')?>"/>
								</div>
                                 <div class="form-group">
                                  	<label><?php echo lang('body');?></label><hr />
                                    <textarea rows="10" cols="80" name="body"><?php echo set_value('body', isset($slides['body']) ? $slides['body'] : '')?></textarea>
                                   
								</div>
                                 <div class="form-group">
                                  	<label><?php echo lang('url');?></label>
                                    <input type="text" class="form-control" name="slug" value="<?php echo set_value('slug', isset($slides['slug']) ? $slides['slug'] : '')?>"/>
								</div>
			 					<div class="form-group">
                                  	<label><?php echo lang('images');?></label><div style="font-size:11px; font-style:italic;">
                                    				*) JPEG, JPG, PNG, GIF ( Best View 1920 x 700 ) | Max. 2MB</div>
								<img src="<?php echo base_url().$slides['image'];?>" width="250" height="90"/>
                                </div><br />
                                <a href="<?php echo site_url('backend_slides/deleteImg/' . $slides['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this?');">Change Image</a> 
                                 <hr />
 									<input type="submit" class="btn btn-primary" value="<?php echo lang('save');?>"/>


                            <?php echo form_close(); ?>
                        </form>
<?php echo form_close(); ?>

						  		</div>
                            </div><!-- /.box -->
                </section><!-- /.content -->
