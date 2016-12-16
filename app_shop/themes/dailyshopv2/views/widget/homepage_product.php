 <!-- Products section -->
  <section id="aa-product"><br />
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
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
                        <li>
                          <figure>
                            <a class="aa-product-img" href="<?php echo site_url($product->slug); ?>"><?php echo $photo; ?></a>
                    		<a class="aa-add-card-btn"href="<?php echo site_url($product->slug); ?>"><span class="fa fa-sign-out"></span><?php echo lang('detail_product');?></a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#"><?php echo $product->name;?></a></h4>
                              <?php if($product->saleprice > 0):?>
                                <span class="aa-product-price"><del><?php echo format_currency($product->price); ?></del></span>
                                <span class="aa-product-price"><?php echo format_currency($product->saleprice); ?></span>
                            <?php else: ?>
                                <span class="aa-product-price"><?php echo format_currency($product->price); ?></span>
                            <?php endif; ?>
                            </figcaption>
                          </figure> 
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
                    <!-- / women product category -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  