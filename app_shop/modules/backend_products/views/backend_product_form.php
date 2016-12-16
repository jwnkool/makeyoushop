<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    	<a href="<?php echo site_url('backend_products');?>" class="btn btn-app btn-sm">
                           <i class="fa fa-mail-reply"></i> <?php echo lang('back') ?>
                        </a>
                        <?php echo lang('product_form') ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend_dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo lang('product_form') ?></li>
                    </ol>
                </section>
                
                <!-- Main content -->
                <section class="content">
                
                	<!-- Small boxes (Stat box) -->
                 	<div class="row">
                    
					<?php $GLOBALS['option_value_count'] = 0;?>
                    <style type="text/css">
                        .sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
                        .sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; height: 18px; }
                        .sortable li>span { position: absolute; margin-left: -1.3em; margin-top:.4em; }
                    </style>
                    
                    <script type="text/javascript">
                    //<![CDATA[
                    
                    $(document).ready(function() {
                        $(".sortable").sortable();
                        $(".sortable > span").disableSelection();
                        //if the image already exists (phpcheck) enable the selector
                    
                        <?php if($id) : ?>
                        //options related
                        var ct	= $('#option_list').children().size();
                        // set initial count
                        option_count = <?php echo count($product_options); ?>;
                        <?php endif; ?>
                    
                        photos_sortable();
                    });
                    
                    function add_product_image(data)
                    {
                        p	= data.split('.');
                        
                        var photo = '<?php add_image("'+p[0]+'", "'+p[0]+'.'+p[1]+'", '', '', '', base_url('uploads/images/thumbnails'));?>';
                        $('#gc_photos').append(photo);
                        $('#gc_photos').sortable('destroy');
                        photos_sortable();
                    }
                    
                    function remove_image(img)
                    {
                        if(confirm('<?php echo lang('confirm_remove_image');?>'))
                        {
                            var id	= img.attr('rel')
                            $('#gc_photo_'+id).remove();
                        }
                    }
                    
                    function photos_sortable()
                    {
                        $('#gc_photos').sortable({	
                            handle : '.gc_thumbnail',
                            items: '.gc_photo',
                            axis: 'y',
                            scroll: true
                        });
                    }
                    
                    function remove_option(id)
                    {
                        if(confirm('<?php echo lang('confirm_remove_option');?>'))
                        {
                            $('#option-'+id).remove();
                        }
                    }
                    
                    //]]>
                    </script>


<div class="col-md-8">
    
<?php echo form_open('backend_products/form/'.$id ); ?>
<div class="row">
	<div class="col-xs-12">
		<div class="tabbable">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#product_info" data-toggle="tab"><?php echo lang('details');?></a></li>
				<?php //if there aren't any files uploaded don't offer the client the tab
				if (count($file_list) > 0):?>
				<li><a href="#product_downloads" data-toggle="tab"><?php echo lang('digital_content');?></a></li>
				<?php endif;?>
				<li><a href="#product_categories" data-toggle="tab"><?php echo lang('categories');?></a></li>
				<li><a href="#product_options" data-toggle="tab"><?php echo lang('options');?></a></li>
				<li><a href="#product_related" data-toggle="tab"><?php echo lang('related_products');?></a></li>
				<li><a href="#product_photos" data-toggle="tab"><?php echo lang('images');?></a></li>
			</ul>
		</div><hr />
		<div class="tab-content">
			<div class="tab-pane active" id="product_info">
				<div class="row">
					<div class="col-xs-12">
						<?php
						$data	= array('placeholder'=>lang('name'), 'name'=>'name', 'value'=>set_value('name', $name), 'class'=>'form-control');
						echo form_input($data);
						?>
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-xs-12">
						
						<?php
						$data	= array('name'=>'description', 'class'=>'redactor', 'value'=>set_value('description', $description));
						echo form_textarea($data);
						?>
						
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-12">
						<label><?php echo lang('excerpt');?></label>
						<?php
						$data	= array('name'=>'excerpt', 'value'=>set_value('excerpt', $excerpt), 'class'=>'form-control', 'rows'=>5);
						echo form_textarea($data);
						?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-12">
						<fieldset>
							<legend><?php echo lang('inventory');?></legend>
							<div class="row" style="padding-top:10px;">
								<div class="col-xs-4">
									<label for="track_stock"><?php echo lang('track_stock');?> </label>
									<?php
								 	$options = array(	 '1'	=> lang('yes')
														,'0'	=> lang('no')
														);
									echo form_dropdown('track_stock', $options, set_value('track_stock',$track_stock), 'class="form-control"');
									?>
								</div>
								<div class="col-xs-4">
									<label for="fixed_quantity"><?php echo lang('fixed_quantity');?> </label>
									<?php
								 	$options = array(	 '0'	=> lang('no')
														,'1'	=> lang('yes')
														);
									echo form_dropdown('fixed_quantity', $options, set_value('fixed_quantity',$fixed_quantity), 'class="form-control"');
									?>
								</div>
								<div class="col-xs-4">
									<label for="quantity"><?php echo lang('quantity');?> </label>
									<?php
									$data	= array('name'=>'quantity', 'value'=>set_value('quantity', $quantity), 'class'=>'form-control');
									echo form_input($data);
									?>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<fieldset>
							<legend><?php echo lang('header_information');?></legend>
							<div class="row" style="padding-top:10px;">
								<div class="col-xs-12">
									
									<label for="slug"><?php echo lang('slug');?> </label>
									<?php
									$data	= array('name'=>'slug', 'value'=>set_value('slug', $slug), 'class'=>'form-control');
									echo form_input($data);?>
									
									<label for="seo_title"><?php echo lang('seo_title');?> </label>
									<?php
									$data	= array('name'=>'seo_title', 'value'=>set_value('seo_title', $seo_title), 'class'=>'form-control');
									echo form_input($data);
									?>

									<label for="meta"><?php echo lang('meta');?> <i><?php echo lang('meta_example');?></i></label> 
									<?php
									$data	= array('name'=>'meta', 'value'=>set_value('meta', html_entity_decode($meta)), 'class'=>'form-control');
									echo form_textarea($data);
									?>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
			
			<div class="tab-pane" id="product_downloads">
				<div class="alert alert-info">
					<?php echo lang('digital_products_desc'); ?>
				</div>
				<fieldset>
					<table class="table table-striped">
						<thead>
							<tr>
								<th><?php echo lang('filename');?></th>
								<th><?php echo lang('title');?></th>
								<th style="width:70px;"><?php echo lang('size');?></th>
								<th style="width:16px;"></th>
							</tr>
						</thead>
						<tbody>
						<?php echo (count($file_list) < 1)?'<tr><td style="text-align:center;" colspan="6">'.lang('no_files').'</td></tr>':''?>
						<?php foreach ($file_list as $file):?>
							<tr>
								<td><?php echo $file->filename ?></td>
								<td><?php echo $file->title ?></td>
								<td><?php echo $file->size ?></td>
								<td><?php echo form_checkbox('downloads[]', $file->id, in_array($file->id, $product_files)); ?></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</fieldset>
			</div>
			
			<div class="tab-pane" id="product_categories">
				<div class="row">
					<div class="col-xs-12">
						<?php if(isset($categories[0])):?>
							<label><strong><?php echo lang('select_a_category');?></strong></label>
							<table class="table table-striped">
							    <thead>
									<tr>
										<th colspan="2"><?php echo lang('name')?></th>
									</tr>
								</thead>
							<?php
							function list_categories($parent_id, $cats, $sub='', $product_categories) {
			
								foreach ($cats[$parent_id] as $cat):?>
								<tr>
									<td><?php echo  $sub.$cat->name; ?></td>
									<td>
										<input type="checkbox" name="categories[]" value="<?php echo $cat->id;?>" <?php echo(in_array($cat->id, $product_categories))?'checked="checked"':'';?>/>
									</td>
								</tr>
								<?php
								if (isset($cats[$cat->id]) && sizeof($cats[$cat->id]) > 0)
								{
									$sub2 = str_replace('&rarr;&nbsp;', '&nbsp;', $sub);
										$sub2 .=  '&nbsp;&nbsp;&nbsp;&rarr;&nbsp;';
									list_categories($cat->id, $cats, $sub2, $product_categories);
								}
								endforeach;
							}
						
						
							list_categories(0, $categories, '', $product_categories);
						
							?>
						</table>
					<?php else:?>
						<div class="alert"><?php echo lang('no_available_categories');?></div>
					<?php endif;?>
					</div>
				</div>
			</div>
			
			<div class="tab-pane" id="product_options">
				<div class="row">
					<div class="col-xs-12">
                        <div class="input-group input-group-sm pull-right">
								<div class="col-xs-8">
                                    <select id="option_options" style="margin:0px;" class="form-control">
                                        <option value=""><?php echo lang('select_option_type')?></option>
                                        <option value="checklist"><?php echo lang('checklist');?></option>
                                        <option value="radiolist"><?php echo lang('radiolist');?></option>
                                        <option value="droplist"><?php echo lang('droplist');?></option>
                                        <option value="textfield"><?php echo lang('textfield');?></option>
                                        <option value="textarea"><?php echo lang('textarea');?></option>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <span class="input-group-btn">
                                        <input id="add_option" class="btn btn-success btn-sm" type="button" value="<?php echo lang('add_option');?>" style="margin:0px;"/>
                                    </span>
                                </div>
                         </div><br /><br />
					</div>
				</div>
				
				<script type="text/javascript">
				
				$( "#add_option" ).click(function(){
					if($('#option_options').val() != '')
					{
						add_option($('#option_options').val());
						$('#option_options').val('');
					}
				});
				
				function add_option(type)
				{
					//increase option_count by 1
					option_count++;
					
					<?php
					$value			= array(array('name'=>'', 'value'=>'', 'weight'=>'', 'price'=>'', 'limit'=>''));
					$js_textfield	= (object)array('name'=>'', 'type'=>'textfield', 'required'=>false, 'values'=>$value);
					$js_textarea	= (object)array('name'=>'', 'type'=>'textarea', 'required'=>false, 'values'=>$value);
					$js_radiolist	= (object)array('name'=>'', 'type'=>'radiolist', 'required'=>false, 'values'=>$value);
					$js_checklist	= (object)array('name'=>'', 'type'=>'checklist', 'required'=>false, 'values'=>$value);
					$js_droplist	= (object)array('name'=>'', 'type'=>'droplist', 'required'=>false, 'values'=>$value);
					?>
					if(type == 'textfield')
					{
						$('#options_container').append('<?php add_option($js_textfield, "'+option_count+'");?>');
					}
					else if(type == 'textarea')
					{
						$('#options_container').append('<?php add_option($js_textarea, "'+option_count+'");?>');
					}
					else if(type == 'radiolist')
					{
						$('#options_container').append('<?php add_option($js_radiolist, "'+option_count+'");?>');
					}
					else if(type == 'checklist')
					{
						$('#options_container').append('<?php add_option($js_checklist, "'+option_count+'");?>');
					}
					else if(type == 'droplist')
					{
						$('#options_container').append('<?php add_option($js_droplist, "'+option_count+'");?>');
					}
				}
				
				function add_option_value(option)
				{
					
					option_value_count++;
					<?php
					$js_po	= (object)array('type'=>'radiolist');
					$value	= (object)array('name'=>'', 'value'=>'', 'weight'=>'', 'price'=>'');
					?>
					$('#option-items-'+option).append('<?php add_option_value($js_po, "'+option+'", "'+option_value_count+'", $value);?>');
				}
				
				$(document).ready(function(){
					$('body').on('click', '.option_title', function(){
						$($(this).attr('href')).slideToggle();
						return false;
					});
					
					$('body').on('click', '.delete-option-value', function(){
						if(confirm('<?php echo lang('confirm_remove_value');?>'))
						{
							$(this).closest('.option-values-form').remove();
						}
					});
					
					
					
					$('#options_container').sortable({
						axis: "y",
						items:'tr',
						handle:'.handle',
						forceHelperSize: true,
						forcePlaceholderSize: true
					});
					
					$('.option-items').sortable({
						axis: "y",
						handle:'.handle',
						forceHelperSize: true,
						forcePlaceholderSize: true
					});
				});
				</script>
				<style type="text/css">
					.option-form {
						display:none;
						margin-top:10px;
					}
					.option-values-form
					{
						
						padding:6px 3px 6px 6px;
						-webkit-border-radius: 3px;
						-moz-border-radius: 3px;
						border-radius: 3px;
						margin-bottom:5px;
						
					}
					
					.option-values-form input {
						margin:0px;
					}
					.option-values-form a {
						margin-top:3px;
					}
				</style>
				<div class="row">
					<div class="col-xs-12">
						<table class="table table-bordered"  id="options_container">
							<?php
							$counter	= 0;
							if(!empty($product_options))
							
							{
								foreach($product_options as $po)
								{
									$po	= (object)$po;
									if(empty($po->required)){$po->required = false;}

									add_option($po, $counter);
									$counter++;
								}
							}?>
								
						</table>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="product_related">
				<div class="row">
					<div class="col-xs-12">
						<label><strong><?php echo lang('select_a_product');?></strong></label>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12" style="text-align:center">
						<div class="row">
							<div class="col-xs-12">
								<input class="form-control" type="text" id="product_search" />
								<script type="text/javascript">
								$('#product_search').keyup(function(){
									$('#product_list').html('');
									run_product_query();
								});
						
								function run_product_query()
								{
									$.post("<?php echo site_url('backend_products/product_autocomplete/');?>", { name: $('#product_search').val(), limit:10},
										function(data) {
									
											$('#product_list').html('');
									
											$.each(data, function(index, value){
									
												if($('#related_product_'+index).length == 0)
												{
													$('#product_list').append('<option id="product_item_'+index+'" value="'+index+'">'+value+'</option>');
												}
											});
									
									}, 'json');
								}
								</script>
							</div>
						</div><hr />
						<div class="row">
							<div class="col-xs-12">
								<select class="form-control" id="product_list" size="5" style="margin:0px;"></select>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12" style="margin-top:8px;">
								<a href="#" onclick="add_related_product();return false;" class="btn btn-warning btn-sm" title="Add Related Product"><?php echo lang('add_related_product');?></a>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<table class="table table-striped" style="margin-top:10px;">
							<tbody id="product_items_container">
							<?php
							foreach($related_products as $rel)
							{
								echo related_items($rel->id, $rel->name);
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			<div class="tab-pane" id="product_photos">
				<div class="row">
					<iframe id="iframe_uploader" src="<?php echo site_url('backend_products/product_image_form');?>" class="col-xs-12" style="height:75px; border:0px;"></iframe>
				</div>
				<div class="row">
					<div class="col-xs-12">
						
						<div id="gc_photos">
							
						<?php
						foreach($images as $photo_id=>$photo_obj)
						{
							if(!empty($photo_obj))
							{
								$photo = (array)$photo_obj;
								add_image($photo_id, $photo['filename'], $photo['alt'], $photo['caption'], isset($photo['primary']));
							}

						}
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
 </div>
</div>

 
<div class="col-md-4"><hr />
		<?php
	 	$options = array(	 '0'	=> lang('disabled')
							,'1'	=> lang('enabled')
							);
		echo form_dropdown('enabled', $options, set_value('enabled',$enabled), 'class="form-control"');
		?>
		<hr />
		<?php
		$options = array(	 '1'	=> lang('shippable')
							,'0'	=> lang('not_shippable')
							);
		echo form_dropdown('shippable', $options, set_value('shippable',$shippable), 'class="form-control"');
		?>
		<hr />
		<?php
		$options = array(	 '1'	=> lang('taxable')
							,'0'	=> lang('not_taxable')
							);
		echo form_dropdown('taxable', $options, set_value('taxable',$taxable), 'class="form-control"');
		?>
		<hr />
		<label for="sku"><?php echo lang('sku');?></label>
		<?php
		$data	= array('name'=>'sku', 'value'=>set_value('sku', $sku), 'class'=>'form-control');
		echo form_input($data);?>
		
		<label for="weight"><?php echo lang('weight');?> </label>
		<?php
		$data	= array('name'=>'weight', 'value'=>set_value('weight', $weight), 'class'=>'form-control');
		echo form_input($data);?>
		
		<label for="price"><?php echo lang('price');?></label>
		<?php
		$data	= array('name'=>'price', 'value'=>set_value('price', $price), 'class'=>'form-control');
		echo form_input($data);?>
		
		<label for="saleprice"><?php echo lang('saleprice');?></label>
		<?php
		$data	= array('name'=>'saleprice', 'value'=>set_value('saleprice', $saleprice), 'class'=>'form-control');
		echo form_input($data);?>
        <hr />
        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo lang('save');?></button>
        </div>
    </form>
</div>
					</div><!-- /.row -->
             </section>
<?php
function add_image($photo_id, $filename, $alt, $caption, $primary=false)
{

	ob_start();
	?>
	<div class="row gc_photo" id="gc_photo_<?php echo $photo_id;?>" style="background-color:#f9f9f9; border-bottom:1px solid #ddd; padding-bottom:20px; margin-bottom:20px;">
		<div class="col-xs-4">
			<input type="hidden" name="images[<?php echo $photo_id;?>][filename]" value="<?php echo $filename;?>"/>
			<img class="gc_thumbnail" src="<?php echo base_url('uploads/images/thumbnails/'.$filename);?>" style="padding:5px; border:1px solid #ddd"/>
		</div>
		<div class="col-xs-8">
			<div class="row">
				<div class="col-xs-4">
					<input name="images[<?php echo $photo_id;?>][alt]" value="<?php echo $alt;?>" class="form-control" placeholder="<?php echo lang('alt_tag');?>"/>
				</div>
				<div class="col-xs-2">
					<input type="radio" name="primary_image" value="<?php echo $photo_id;?>" <?php if($primary) echo 'checked="checked"';?>/> <?php echo lang('primary');?>
				</div>
				<div class="col-xs-2">
					<a onclick="return remove_image($(this));" rel="<?php echo $photo_id;?>" class="btn btn-danger btn-sm" style="float:right; font-size:9px;"><i class="fa fa-trash-o"></i> <?php echo lang('remove');?></a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4">
					<label><?php echo lang('caption');?></label>
					<textarea name="images[<?php echo $photo_id;?>][caption]" class="form-control" rows="3"><?php echo $caption;?></textarea>
				</div>
			</div>
		</div>
	</div>

	<?php
	$stuff = ob_get_contents();

	ob_end_clean();
	
	echo replace_newline($stuff);
}


function add_option($po, $count)
{
	ob_start();
	?>
	<tr id="option-<?php echo $count;?>">
		<td>
			<a class="handle btn btn-warning btn-sm"><i class="fa fa-arrows"></i></a>
			<strong><a class="option_title" href="#option-form-<?php echo $count;?>"><?php echo $po->type;?> <?php echo (!empty($po->name))?' : '.$po->name:'';?></a></strong>
			<button type="button" class="btn btn-sm btn-danger pull-right" onclick="remove_option(<?php echo $count ?>);"><i class="fa fa-trash-o"></i></button>
			<input type="hidden" name="option[<?php echo $count;?>][type]" value="<?php echo $po->type;?>" />
            <hr />
			<div class="col-xs-12" id="option-form-<?php echo $count;?>">
				
					<div class="col-xs-8">
						<input type="text" class="form-control" placeholder="<?php echo lang('option_name');?>" name="option[<?php echo $count;?>][name]" value="<?php echo $po->name;?>"/>
                        
						<input type="checkbox" name="option[<?php echo $count;?>][required]" value="1" <?php echo ($po->required)?'checked="checked"':'';?>/> <?php echo lang('required');?>
					</div>
						<?php if($po->type!='textarea' && $po->type!='textfield'):?>
                                <a class="btn btn-info" onclick="add_option_value(<?php echo $count;?>);"><i class="fa fa-refresh"></i> <?php echo lang('add_item');?></a>
						<?php endif;?>
                        
                   
                            <?php if($po->type!='textarea' && $po->type!='textfield'):?>
                            <div class="col-xs-6">&nbsp;</div>
                            <?php endif;?>
                            
                         
						<div class="col-xs-12">

                            <div class="row-fluid">
                                <?php if($po->type!='textarea' && $po->type!='textfield'):?>
                                <!--div class="span1">&nbsp;</div-->
                                <?php endif;?>
                                <div class="col-xs-2"><strong>&nbsp;<?php echo lang('name');?></strong></div>
                                <div class="col-xs-2"><strong>&nbsp;<?php echo lang('value');?></strong></div>
                                <div class="col-xs-2"><strong>&nbsp;<?php echo lang('weight');?></strong></div>
                                <div class="col-xs-2"><strong>&nbsp;<?php echo lang('price');?></strong></div>
                                <div class="col-xs-2"><strong>&nbsp;<?php echo ($po->type=='textfield')?lang('limit'):'';?></strong></div>
                            </div>
                            <div class="option-items" id="option-items-<?php echo $count;?>">
                            <?php if($po->values):?>
                                <?php
                                foreach($po->values as $value)
                                {
                                    $value = (object)$value;
                                    add_option_value($po, $count, $GLOBALS['option_value_count'], $value);
                                    $GLOBALS['option_value_count']++;
                                }?>
                            <?php endif;?>
                            </div>
                        </div>
                
			</div>
		</td>
	</tr>
	
	<?php
	$stuff = ob_get_contents();

	ob_end_clean();
	
	echo replace_newline($stuff);
}

function add_option_value($po, $count, $valcount, $value)
{
	ob_start();
	?>
	<div class="col-xs-12">
		<div class="row-fluid">
			<?php if($po->type!='textarea' && $po->type!='textfield'):?>
            <!--div class="col-xs-1"><a class="handle btn btn-sm btn-default" style="float:left;"><i class="fa fa-arrows"></i></a></div-->
			<?php endif;?>
			<div class="col-xs-2"><input type="text" class="form-control" name="option[<?php echo $count;?>][values][<?php echo $valcount ?>][name]" value="<?php echo $value->name ?>" /></div>
            
			<div class="col-xs-2"><input type="text" class="form-control" name="option[<?php echo $count;?>][values][<?php echo $valcount ?>][value]" value="<?php echo $value->value ?>" /></div>
            
			<div class="col-xs-2"><input type="text" class="form-control" name="option[<?php echo $count;?>][values][<?php echo $valcount ?>][weight]" value="<?php echo $value->weight ?>" /></div>
            
			<div class="col-xs-2"><input type="text" class="form-control" name="option[<?php echo $count;?>][values][<?php echo $valcount ?>][price]" value="<?php echo $value->price ?>" /></div>
            
			<div class="col-xs-2">
			<?php if($po->type=='textfield'):?><input class="form-control" type="text" name="option[<?php echo $count;?>][values][<?php echo $valcount ?>][limit]" value="<?php echo $value->limit ?>" />
			<?php elseif($po->type!='textarea' && $po->type!='textfield'):?>
				<a class="delete-option-value btn btn-danger btn-sm pull-right"><i class="fa fa-trash-o"></i></a>
			<?php endif;?>
			</div>
           <br /><br />
           
		</div>
	</div>
	<?php
	$stuff = ob_get_contents();

	ob_end_clean();

	echo replace_newline($stuff);
}
//this makes it easy to use the same code for initial generation of the form as well as javascript additions
function replace_newline($string) {
  return trim((string)str_replace(array("\r", "\r\n", "\n", "\t"), ' ', $string));
}
?>
<script type="text/javascript">
//<![CDATA[
var option_count		= <?php echo $counter?>;
var option_value_count	= <?php echo $GLOBALS['option_value_count'];?>

function add_related_product()
{
	//if the related product is not already a related product, add it
	if($('#related_product_'+$('#product_list').val()).length == 0 && $('#product_list').val() != null)
	{
		<?php $new_item	 = str_replace(array("\n", "\t", "\r"),'',related_items("'+$('#product_list').val()+'", "'+$('#product_item_'+$('#product_list').val()).html()+'"));?>
		var related_product = '<?php echo $new_item;?>';
		$('#product_items_container').append(related_product);
		run_product_query();
	}
	else
	{
		if($('#product_list').val() == null)
		{
			alert('<?php echo lang('alert_select_product');?>');
		}
		else
		{
			alert('<?php echo lang('alert_product_related');?>');
		}
	}
}

function remove_related_product(id)
{
	if(confirm('<?php echo lang('confirm_remove_related');?>'))
	{
		$('#related_product_'+id).remove();
		run_product_query();
	}
}

function photos_sortable()
{
	$('#gc_photos').sortable({	
		handle : '.gc_thumbnail',
		items: '.gc_photo',
		axis: 'y',
		scroll: true
	});
}
//]]>
</script>
<?php
function related_items($id, $name) {
	return '
			<tr id="related_product_'.$id.'">
				<td>
					<input type="hidden" name="related_products[]" value="'.$id.'"/>
					'.$name.'</td>
				<td>
					<a class="btn btn-danger pull-right btn-sm" href="#" onclick="remove_related_product('.$id.'); return false;"><i class="fa fa-trash-o"></i> '.lang('remove').'</a>
				</td>
			</tr>
		';
}