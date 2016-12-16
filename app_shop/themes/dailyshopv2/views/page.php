
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="<?php echo base_url();?>assets/img/header.jpg">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo  $page->title; ?></h2>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>">Home</a></li>         
          <li class="active"><?php echo  $page->title; ?></li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- Blog Archive -->
  <section id="aa-blog-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-blog-archive-area">
            <div class="row">
              <div class="col-md-9">
                <!-- Blog details -->
                <div class="aa-blog-content aa-blog-details">
                  <article class="aa-blog-content-single">                        
                    <h2><a href="#"><?php echo  $page->title; ?></a></h2>
                     <div class="aa-article-bottom">
                      <div class="aa-post-author">
                        <?php echo lang('posted_by')?> <a href="#">Admin</a>
                      </div>
                    </div>
                    <p><?php echo  $page->content_pages; ?></p>
                  </article>
                  </div>
                </div>
  			 
        		<?php $this->load->view('widget/sidebar_pages') ?>
                
            </div>           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Blog Archive -->
