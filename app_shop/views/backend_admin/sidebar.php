<!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url() ?>assets/admin_theme/img/avatar.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Backend Panel</p>

                            <a href="#"><i class="fa fa-coffee"></i> Online</a>
                        </div>
                    </div>
                    
                    <?php if($this->auth->is_logged_in(false, false)):?>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="<?php echo site_url('backend_dashboard');?>">
                                <i class="fa fa-dashboard"></i> <span><?php echo lang('dashboard') ?></span>
                            </a>
                        </li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i>
                                <span><?php echo lang('common_sales') ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo site_url('backend_orders');?>"><i class="fa fa-angle-double-right"></i><?php echo lang('common_orders') ?></a></li>
                                <?php if($this->auth->check_access('Admin')) : ?>
                                    <li><a href="<?php echo site_url('backend_customers');?>"><i class="fa fa-angle-double-right"></i><?php echo lang('common_customers') ?></a></li>
                                    <li><a href="<?php echo site_url('backend_customers/groups');?>"><i class="fa fa-angle-double-right"></i><?php echo lang('common_groups') ?></a></li>
                                    <li><a href="<?php echo site_url('backend_reports');?>"><i class="fa fa-angle-double-right"></i><?php echo lang('common_reports') ?></a></li>
                                    <li><a href="<?php echo site_url('backend_coupons');?>"><i class="fa fa-angle-double-right"></i><?php echo lang('common_coupons') ?></a></li>
                                    <li><a href="<?php echo site_url('backend_giftcards');?>"><i class="fa fa-angle-double-right"></i><?php echo lang('common_giftcards') ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        
                         <?php
                    // Restrict access to Admins only
                    if($this->auth->check_access('Admin')) : ?>
                    <li class="treeview">
                            <a href="#">
                                    <i class="fa fa-briefcase"></i>
                                    <span><?php echo lang('common_catalog') ?></span>
                                    <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo site_url('backend_categories');?>"><i class="fa fa-angle-double-right"></i><?php echo lang('common_categories') ?></a></li>
                                <li><a href="<?php echo site_url('backend_products');?>"><i class="fa fa-angle-double-right"></i><?php echo lang('common_products') ?></a></li>
                                <li><a href="<?php echo site_url('backend_digital_products');?>"><i class="fa fa-angle-double-right"></i><?php echo lang('common_digital_products') ?></a></li>
                            </ul>
                    </li>
                    
                    <li class="treeview">
                       		<a href="#">
                                    <i class="fa fa-folder-open"></i>
                                    <span><?php echo lang('common_content') ?></span>
                                    <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo site_url('backend_pages');?>"><i class="fa fa-angle-double-right"></i><?php echo lang('common_pages') ?></a></li>
                                <li><a href="<?php echo site_url('backend_slides');?>"><i class="fa fa-angle-double-right"></i><?php echo lang('common_slideshow') ?></a></li>
                            </ul>
                    </li>
                    
                    <li class="treeview">
                    		<a href="#">
                                    <i class="fa fa-tags"></i>
                                    <span><?php echo lang('common_modules') ?></span>
                                    <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo site_url('backend_shipping');?>"><i class="fa fa-angle-double-right"></i><?php echo lang('common_shipping_modules') ?></a></li>
                                <li><a href="<?php echo site_url('backend_payment');?>"><i class="fa fa-angle-double-right"></i><?php echo lang('common_payment_modules') ?></a></li>
                            </ul>
                    </li>
                    
                    <li class="treeview">
                    		<a href="#">
                                    <i class="fa fa-gears"></i>
                                    <span><?php echo lang('common_administrative') ?></span>
                                    <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo site_url('backend_settings');?>"><i class="fa fa-angle-double-right"></i><?php echo lang('common_gocart_configuration') ?></a></li>
                                <li><a href="<?php echo site_url('backend_settings/canned_messages');?>"><i class="fa fa-angle-double-right"></i><?php echo lang('common_canned_messages') ?></a></li>
                                <li><a href="<?php echo site_url('backend_locations');?>"><i class="fa fa-angle-double-right"></i><?php echo lang('common_locations') ?></a></li>
                                <li><a href="<?php echo site_url('backend_admin');?>"><i class="fa fa-angle-double-right"></i><?php echo lang('common_administrators') ?></a></li>
                            </ul>
                    </li>
                    <?php endif; ?>
                    
                    <li>
                         <a href="<?php echo site_url('backend_dashboard/about_system');?>">
                              <i class="fa fa-bug"></i> <span><?php echo lang('about_system') ?></span>
                         </a>
                    </li>
                    
                    <?php endif;?>    
                    </ul>
                    
                </section>
                <!-- /.sidebar -->
            </aside>