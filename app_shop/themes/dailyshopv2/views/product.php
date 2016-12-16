 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i></a></li>                   
               <?php
                    $url_path	= '';
                    $count	 	= 1;
                        foreach($base_url as $bc):
                            $url_path .= '/'.$bc;
                                if($count == count($base_url)):?>
                                   <li><a href=""><?php echo $bc;?></a></li>
                                <?php else:?>
                                   <li><a href="<?php echo site_url($url_path);?>"><?php echo $bc;?></a></li>
                                <?php endif;
                                   $count++;
                  endforeach;
               ?>
            </ol>
        </div>
       </div>
     </div>
  </section>
  <!-- / catg header banner section -->
  
    <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
			  <?php
                $photo  = theme_img('no_picture.png', lang('no_image_available'));
                $product->images    = array_values($product->images);

                if(!empty($product->images[0]))
                {
                    $primary    = $product->images[0];
                    foreach($product->images as $photo)
                    {
                        if(isset($photo->primary))
                        {
                            $primary    = $photo;
                        }
                    }

                    $photo  = '<img class="img-responsive" src="'.base_url('uploads/images/full/'.$primary->filename).'" alt="'.$product->seo_title.'"/>';
                }
                //echo $photo
                ?>
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                     
                    
                                <!-- product-imge-->
                                <ul id="etalage"> 
									<?php foreach($product->images as $image):?>
                                    <li> 
                                        <img class="etalage_source_image img-responsive" src="<?php echo base_url('uploads/images/full/'.$image->filename);?>"/>
                                        <img class="etalage_thumb_image img-responsive" src="<?php echo base_url('uploads/images/medium/'.$image->filename);?>"/>
                                    </li>
                                    <?php endforeach;?>
                                </ul> 
                                <!-- product-imge-->
                    
                </div>
                
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3><?php echo $product->name;?></h3>
                    <div class="aa-price-block">
                      		<?php if($product->saleprice > 0):?>
                                <span class="aa-product-price"><del><?php echo format_currency($product->price); ?></del></span>
                                <span class="aa-product-price"><?php echo format_currency($product->saleprice); ?></span>
                            <?php else: ?>
                                <span class="aa-product-price"><?php echo format_currency($product->price); ?></span>
                            <?php endif; ?>
                            
                      	<div class="aa-product-avilability">
							<?php if(!empty($product->sku)):?><span style="font-size:12px; color:#060;"><?php echo lang('sku');?> : <?php echo $product->sku; ?></span><?php endif;?>&nbsp;
                    	</div>
                    </div>
                    
                    <p><?php echo $product->excerpt;?></p>
                    
                    <?php echo form_open('cart/add_to_cart', 'class="aa-price-block"');?>
                    <input type="hidden" name="cartkey" value="<?php echo $this->session->flashdata('cartkey');?>" />
                    <input type="hidden" name="id" value="<?php echo $product->id?>"/>
                    <fieldset>
                    <?php if(count($options) > 0): ?>
                        <?php foreach($options as $option):
                            $required   = '';
                            if($option->required)
                            {
                                $required = ' <p style="font-size:12px; color:red;">*) Required</p>';
                            }
                            ?>
                            <div class="aa-prod-view-size">
                                <label><?php echo $option->name;?></label>
                                <?php
                                if($option->type == 'checklist')
                                {
                                    $value  = array();
                                    if($posted_options && isset($posted_options[$option->id]))
                                    {
                                        $value  = $posted_options[$option->id];
                                    }
                                }
                                else
                                {
                                    if(isset($option->values[0]))
                                    {
                                        $value  = $option->values[0]->value;
                                        if($posted_options && isset($posted_options[$option->id]))
                                        {
                                            $value  = $posted_options[$option->id];
                                        }
                                    }
                                    else
                                    {
                                        $value = false;
                                    }
                                }

                                if($option->type == 'textfield'):?>
                                    <div class="controls">
                                        <input type="text" name="option[<?php echo $option->id;?>]" value="<?php echo $value;?>" class="form-control"/>
                                        <?php echo $required;?>
                                    </div>
                                <?php elseif($option->type == 'textarea'):?>
                                    <div class="controls">
                                        <textarea class="form-control" name="option[<?php echo $option->id;?>]"><?php echo $value;?></textarea>
                                        <?php echo $required;?>
                                    </div>
                                <?php elseif($option->type == 'droplist'):?>
                                    <div class="controls">
                                        <select name="option[<?php echo $option->id;?>]" class="form-control">
                                            <option value=""><?php echo lang('choose_option');?></option>

                                        <?php foreach ($option->values as $values):
                                            $selected   = '';
                                            if($value == $values->id)
                                            {
                                                $selected   = ' selected="selected"';
                                            }?>

                                            <option<?php echo $selected;?> value="<?php echo $values->id;?>">
                                                <?php echo($values->price != 0)?' (+'.format_currency($values->price).') ':''; echo $values->name;?>
                                            </option>

                                        <?php endforeach;?>
                                        </select>
                                        <?php echo $required;?>
                                    </div>
                                <?php elseif($option->type == 'radiolist'):?>
                                    <div class="controls">
                                        <?php foreach ($option->values as $values):

                                            $checked = '';
                                            if($value == $values->id)
                                            {
                                                $checked = ' checked="checked"';
                                            }?>
                                            <label>
                                                <a href="#"><input<?php echo $checked;?> type="radio" name="option[<?php echo $option->id;?>]" value="<?php echo $values->id;?>"/>
                                                <?php echo($values->price != 0)?'(+'.format_currency($values->price).') ':''; echo $values->name;?></a>
                                            </label>
                                        <?php endforeach;?>
                                        <?php echo $required;?>
                                    </div>
                                <?php elseif($option->type == 'checklist'):?>
                                    <div class="controls">
                                        <?php foreach ($option->values as $values):

                                            $checked = '';
                                            if(in_array($values->id, $value))
                                            {
                                                $checked = ' checked="checked"';
                                            }?>
                                            <label>
                                                <a href="#"><input<?php echo $checked;?> type="checkbox" name="option[<?php echo $option->id;?>][]" value="<?php echo $values->id;?>"/>
                                                <?php echo($values->price != 0)?'('.format_currency($values->price).') ':''; echo $values->name;?></a>
                                            </label>
                                            
                                        <?php endforeach; ?>
                                    </div>
                                    <?php echo $required;?>
                                <?php endif;?>
                                </div>
                        <?php endforeach;?>
                    <?php endif;?>
                    
                    <div class="aa-prod-quantity">
                       <label><?php echo lang('quantity') ?></label>
                        <div class="controls">
                            <?php if(!config_item('inventory_enabled') || config_item('allow_os_purchase') || !(bool)$product->track_stock || $product->quantity > 0) : ?>
                                <?php if(!$product->fixed_quantity) : ?>
                                    <input class="form-control" type="text" name="quantity" value="" placeholder="1"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php endif; ?>
                        </div>
                    </div>
                    <div class="aa-prod-view-bottom">
                      	<button class="btn btn-info" type="submit" value="submit"><i class="fa fa-shopping-cart"></i> <?php echo lang('form_add_to_cart');?></button>
                            <?php endif;?>
                    </div>
                    <div class="aa-prod-view-size">
                    	<?php if((bool)$product->track_stock && $product->quantity < 1 && config_item('inventory_enabled')):?>
                        <a href="#" class="btn-danger"><?php echo lang('out_of_stock');?></a>
                    <?php endif;?>
                    </div>
                  </div>
                </div>
              </div>
                    </fieldset>
             </form>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab"><?php echo lang('tab_description');?></a></li>        
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <p><?php echo $product->description; ?></p>
                </div>           
              </div>
            </div>
            
    		<?php if(!empty($product->related_products)):?>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
               <?php foreach($product->related_products as $relate):?>
                <?php
                        $photo  = theme_img('no_picture.png', lang('no_image_available'));
                        $relate->images = array_values((array)json_decode($relate->images));
                        
                        if(!empty($relate->images[0]))
                        {
                            $primary    = $relate->images[0];
                            foreach($relate->images as $photo)
                            {
                                if(isset($photo->primary))
                                {
                                    $primary    = $photo;
                                }
                            }

                            $photo  = '<img src="'.base_url('uploads/images/thumbnails/'.$primary->filename).'" alt="'.$relate->seo_title.'"/>';
                        }
                   ?>
                <li>
                  <figure>
                    <center><a class="aa-product-img" href="<?php echo site_url($relate->slug); ?>"><?php echo $photo; ?></a></center>
                    <a class="aa-add-card-btn"href="<?php echo site_url($relate->slug); ?>"><span class="fa fa-sign-out"></span><?php echo lang('detail_product');?></a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="<?php echo site_url($relate->slug); ?>"><?php echo $relate->name;?></a></h4>
                      <?php if($relate->saleprice > 0):?>
                                <span class="aa-product-price"><del><?php echo format_currency($relate->price); ?></del></span>
                                <span class="aa-product-price"><?php echo format_currency($relate->saleprice); ?></span>
                            <?php else: ?>
                                <span class="aa-product-price"><?php echo format_currency($relate->price); ?></span>
                            <?php endif; ?>
                    </figcaption>
                  </figure>       
                  <!-- product badge -->
                  <?php if($relate->saleprice > 0):?>
                          <span class="aa-badge aa-sale"><?php echo lang('on_sale');?></span>
                  	<?php endif; ?>
                  <?php if((bool)$relate->track_stock && $relate->quantity < 1 && config_item('inventory_enabled')) { ?>
                        <span class="aa-badge aa-sale"><?php echo lang('out_of_stock');?></span>
                  <?php } ?>
                </li> 
                <?php endforeach;?>                                                                           
              </ul>
            </div> 
     		<?php endif;?>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->
