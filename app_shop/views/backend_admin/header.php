<!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo site_url('backend_dashboard');?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                ADMIN PANEL
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo lang('common_actions');?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo base_url() ?>assets/admin_theme/img/avatar.png" class="img-circle" alt="User Image" />
                                    <p>
                                        MAKEYOUSHOP
                                        <small>Copyleft - 2016.</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo site_url();?>" target="_blank" class="btn btn-default btn-flat"><i class="fa fa-sitemap"></i> <?php echo lang('frontend') ?></a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo site_url('backend_login/logout');?>" class="btn btn-default btn-flat"><i class="fa fa-power-off"></i> <?php echo lang('common_log_out') ?></a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>