<div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            
          <?php if(isset($category)):?>
           	<?php if(isset($this->categories[$category->id] ) && count($this->categories[$category->id]) > 0):?>
            <div class="aa-sidebar-widget">
              <h3><?php echo lang('subcategories'); ?></h3>
              <ul class="aa-catg-nav">
           		<?php foreach($this->categories[$category->id] as $subcategory):?>
                     <li <?php echo $subcategory->active ? 'class="active"' : false; ?>>
                     <a href="<?php echo site_url(implode('/', $base_url).'/'.$subcategory->slug); ?>"><i class="fa fa-chevron-circle-right"></i> <?php echo $subcategory->name;?></a></li> 
				<?php endforeach;?>
              </ul>
            </div>
			<?php endif;?>
          <?php endif;?>
            
          </aside>
        </div>