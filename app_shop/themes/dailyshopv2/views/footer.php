 <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3><?php echo $this->config->item('company_name');?></h3>
                  <ul class="aa-footer-nav">
                   <?php
						if(isset($this->pages[0]))
						{
							foreach($this->pages[0] as $menu_page):?>
								<li>
								<?php if(empty($menu_page->content)):?>
									<a href="<?php echo site_url($menu_page->slug);?>"><?php echo $menu_page->menu_title;?></a>
								<?php else:?>
									<a href="<?php echo $menu_page->url;?>" <?php if($menu_page->new_window ==1){echo 'target="_blank"';} ?>><?php echo $menu_page->menu_title;?></a>
								<?php endif;?>
								</li>
								
							<?php endforeach;	
						}
					?>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3><?php echo lang('welcome_account');?></h3>
                    <ul class="aa-footer-nav">
              <?php if($this->Customer_model->is_logged_in(false, false)):?>
                      	<li><a href="<?php echo  site_url('secure/my_account');?>"><?php echo lang('my_account')?></a></li>
						<li><a href="<?php echo  site_url('secure/my_downloads');?>"><?php echo lang('my_downloads')?></a></li>
						<li><a href="<?php echo site_url('secure/logout');?>"><?php echo lang('logout');?></a></li>    
              <?php else: ?>
						<li><a href="<?php echo site_url('secure/login');?>"><?php echo lang('login');?></a></li>
						<li><a href="<?php echo site_url('secure/forgot_password'); ?>"><?php echo lang('forgot_password')?></a></li>
			  <?php endif; ?>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3><?php echo lang('new_member');?></h3>
                    <ul class="aa-footer-nav">
                        <li><a href="<?php echo site_url('secure/register'); ?>"><?php echo lang('register')?></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3><?php echo lang('contact_info');?></h3>
                    <address>
                      <p> <?php echo $this->config->item('address1');?></p>
                      <p> <?php echo $this->config->item('address2');?></p>
                      <p><span class="fa fa-phone"></span><?php echo $this->config->item('telephone');?></p>
                      <p><span class="fa fa-envelope"></span><?php echo $this->config->item('email');?></p>
                    </address>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p style="font-size:10px;">&copy; Designed by <a href="http://www.markups.io/" target="_blank">MarkUps.io</a></p>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer --> 
	<script>
						jQuery(document).ready(function($){
			
							$('#etalage').etalage({
								thumb_image_width: 260,
								thumb_image_height: 320,
								
								show_hint: true,
								click_callback: function(image_anchor, instance_id){
									alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
								}
							});
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

					});
				</script>
  </body>
</html>