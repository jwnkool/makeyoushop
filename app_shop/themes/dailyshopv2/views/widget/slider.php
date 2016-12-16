
  
  <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
         <ul class="seq-canvas">
            <!-- single slide item -->
            <?php $slides = $this->go_cart->getSlides(); ?>
                    	<?php if (!empty($slides)): ?>
							<?php foreach ($slides as $slide): ?>
            <li>
              <div class="seq-model">
                <img alt="<?php echo $slide['title'] ?>" src="<?php echo base_url($slide['image']); ?>" title="<?php echo $slide['title'] ?>" />
              </div>
              <div class="seq-title">
               <span data-seq><?php echo $slide['title'] ?></span>                
                <h2 data-seq><a href="<?php echo $slide['slug'] ?>"><?php echo $slide['title'] ?></a></h2>                
                <p data-seq><?php echo substr("".$slide['body']."",0, 150)?></p>
              </div>
            </li>   
                			<?php endforeach; ?>      
						<?php endif; ?>               
          </ul>
        <!-- slider navigation btn -->
<!--
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
-->
      </div>
    </div>
  </section>
  <!-- / slider -->