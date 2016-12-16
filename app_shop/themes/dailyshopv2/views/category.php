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
  <section id="aa-product-category">
	  <?php if(count($products) == 0):?>
         <h3 style="margin:50px 0px; text-align:center;">
            <?php echo lang('no_products');?>
         </h3>
     <?php elseif(count($products) > 0):?> 
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
        <?php if(!empty($category->description)): ?>
            <div class="row">
                <div class="col-md-9"><?php echo $category->description; ?></div>
            </div>
        <?php endif; ?>
        
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <select class="form-control" id="sort_products" onchange="window.location='<?php echo site_url(uri_string());?>/'+$(this).val();">
                    <option value=''><?php echo lang('sort_by');?></option>
                    <option<?php echo(!empty($_GET['by']) && $_GET['by']=='name/asc')?' selected="selected"':'';?> value="?by=name/asc"><?php echo lang('sort_by_name_asc');?></option>
                    <option<?php echo(!empty($_GET['by']) && $_GET['by']=='name/desc')?' selected="selected"':'';?>  value="?by=name/desc"><?php echo lang('sort_by_name_desc');?></option>
                    <option<?php echo(!empty($_GET['by']) && $_GET['by']=='price/asc')?' selected="selected"':'';?>  value="?by=price/asc"><?php echo lang('sort_by_price_asc');?></option>
                    <option<?php echo(!empty($_GET['by']) && $_GET['by']=='price/desc')?' selected="selected"':'';?>  value="?by=price/desc"><?php echo lang('sort_by_price_desc');?></option>
                </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
            	<?php foreach($products as $product):?>
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

                            $photo  = '<img class="img-responsive" src="'.base_url('uploads/images/medium/'.$primary->filename).'" alt="'.$product->seo_title.'"/>';
                        }
                      ?>
                <!-- start single product item -->
                <li>
                  <figure>
                    <a class="aa-product-img" href="<?php echo site_url(implode('/', $base_url).'/'.$product->slug); ?>"><?php echo $photo; ?></a>
                    <a class="aa-add-card-btn"href="<?php echo site_url(implode('/', $base_url).'/'.$product->slug); ?>"><span class="fa fa-sign-out"></span><?php echo lang('detail_product');?></a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $product->name;?></a></h4>
                            <?php if($product->saleprice > 0):?>
                                <span class="aa-product-price"><del><?php echo format_currency($product->price); ?></del></span>
                                <span class="aa-product-price"><?php echo format_currency($product->saleprice); ?></span>
                            <?php else: ?>
                                <span class="aa-product-price"><?php echo format_currency($product->price); ?></span>
                            <?php endif; ?>
                     	<p class="aa-product-descrip">
							<?php if($product->excerpt != ''): ?>
                                <?php echo $product->excerpt; ?>
                            <?php endif; ?>
                        </p>
                    </figcaption>
                  </figure>
                  <!-- product badge -->
				  	<?php if($product->saleprice > 0):?>
                          <span class="aa-badge btn-info"><?php echo lang('on_sale');?></span>
                  	<?php endif; ?>
					<?php if((bool)$product->track_stock && $product->quantity < 1 && config_item('inventory_enabled')) { ?>
                          <span class="aa-badge btn-warning"><?php echo lang('out_of_stock');?></span>
						<?php 
                        } 
                    ?>
                </li>
				<?php endforeach; ?>
              </ul>
            </div>
            <div class="aa-product-catg-pagination">
              <?php echo $this->pagination->create_links();?>
            </div>
          </div>
        </div>
        
        <?php $this->load->view('widget/sidebar_category_products') ?>
       
      </div>
    </div>
  <?php endif; ?>
  </section>
  <!-- / product category -->

