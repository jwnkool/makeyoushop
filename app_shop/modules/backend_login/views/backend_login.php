<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Admin | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url() ?>assets/admin_theme/login_theme/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url() ?>assets/admin_theme/login_theme/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url() ?>assets/admin_theme/login_theme/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="bg-black">
		<?php
            if($this->session->flashdata('message'))
                {
                    $message    = $this->session->flashdata('message');
                }
                
            	if($this->session->flashdata('error'))
                	{
                    	$error  = $this->session->flashdata('error');
               	 	}
                
            		if(function_exists('validation_errors') && validation_errors() != '')
                		{
                    		$error  = validation_errors();
                		}
        ?>
        <div class="form-box" id="login-box">
        <?php echo form_open('backend_login') ?>
            <div class="header">Login In | Admin Panel</div>
                <div class="body bg-gray">
            		<div align="center">
						<?php if (!empty($message)): ?>
                              <?php echo $message; ?>
                         <?php endif; ?>
                            <?php if (!empty($error)): ?>
                               <?php echo $error; ?>
                        <?php endif; ?>   
                   </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="<?php echo lang('username');?>"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="<?php echo lang('password');?>"/>
                    </div>     
                </div>
                <div class="footer">                                                             
                    <input class="btn bg-olive btn-block" type="submit" value="<?php echo lang('login');?>"/>
                    <input type="hidden" value="<?php echo $redirect; ?>" name="redirect"/>
                    <input type="hidden" value="submitted" name="submitted"/>
                </div>
		<?php echo form_close(); ?>

            	<div style="color: white; font-size: 10px;" align="center">
                	<br />
                    &copy; MAKEYOUSHOP | 2016 
                    <br />
                	Page Rendered in <strong>{elapsed_time}</strong> second.
        		</div>
        </div>

        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url() ?>assets/admin_theme/login_theme/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url() ?>assets/admin_theme/login_theme/js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>