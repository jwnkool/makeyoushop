 <!-- blog sidebar -->
              <div class="col-md-3">
                <aside class="aa-blog-sidebar">
                  <div class="aa-sidebar-widget">
                    <h3><?php echo lang('pages_category')?></h3>
                    <ul class="aa-catg-nav">
                      <?php
						if(isset($this->pages[0]))
						{
							foreach($this->pages[0] as $menu_page):?>
								<li>
								<?php if(empty($menu_page->content)):?>
									<a href="<?php echo site_url($menu_page->slug);?>"><i class="fa fa-caret-right"></i> <?php echo $menu_page->menu_title;?></a>
								<?php endif;?>
								</li>
								
							<?php endforeach;	
						}
					?>
                    </ul>
                  </div>
                </aside>
              </div>