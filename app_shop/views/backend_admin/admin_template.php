<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Panel | <?php echo (isset($page_title))?' :: '.$page_title:''; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/icon.png">
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url() ?>assets/admin_theme/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url() ?>assets/admin_theme/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url() ?>assets/admin_theme/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url() ?>assets/admin_theme/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Redactor plugin -->
        <link href="<?php echo base_url() ?>assets/admin_theme/css/redactor.css" rel="stylesheet" type="text/css" />
		<!-- jQuery UI -->
		<link href="<?php echo base_url() ?>assets/admin_theme/css/jquery-ui.css"rel="stylesheet" type="text/css" />
        
        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url() ?>assets/admin_theme/js/jquery.min.js"></script>
        <!-- jQuery UI -->
        <script src="<?php echo base_url() ?>assets/admin_theme/js/jquery-ui.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url() ?>assets/admin_theme/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() ?>assets/admin_theme/js/app.js" type="text/javascript"></script>
        <!-- Redactor Plugin -->
		<script src="<?php echo base_url() ?>assets/admin_theme/js/redactor.min.js" type="text/javascript"></script>
        
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        	 <?php $this->load->view('backend_admin/header'); ?>
             
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
           
          <?php $this->load->view('backend_admin/sidebar'); ?>
 
                <!-- Main content -->
                <section class="content">
						<!-- Right side column. Contains the navbar and content of the page -->
            				<aside class="right-side"> 
                            
								<?php
                                    //lets have the flashdata overright "$message" if it exists
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
                                    
                                    <div id="js_error_container" class="alert alert-error" style="display:none;"> 
                                        <p id="js_error"></p>
                                    </div>
                                    
                                    <div id="js_note_container" class="alert alert-note" style="display:none;">
                                        
                                    </div>
                                    
                                    <?php if (!empty($message)): ?>
                                        <div class="alert alert-success">
                                            <a class="close" data-dismiss="alert">×</a>
                                            <?php echo $message; ?>
                                        </div>
                                    <?php endif; ?>
                                
                                    <?php if (!empty($error)): ?>
                                        <div class="alert alert-error">
                                            <a class="close" data-dismiss="alert">×</a>
                                            <?php echo $error; ?>
                                        </div>
                                    <?php endif; ?> 
                                                 
									<?php if (!empty($content)): ?>
                                        <?php $this->load->view($content); ?>
                                    <?php else: ?>
                                        <?php echo 'Page not found !'; ?>
                                    <?php endif; ?>   
                                      
                            </aside><!-- /.right-side -->
                 </section><!-- /. content  -->
        </div><!-- ./wrapper -->
     
        
		<script type="text/javascript">
        $(document).ready(function(){
            $('.datepicker').datepicker({dateFormat: 'yy-mm-dd'});
            
            $('.redactor').redactor({
                    minHeight: 200,
                    imageUpload: '<?php echo site_url('backend_wysiwyg/upload_image');?>',
                    fileUpload: '<?php echo site_url('backend_wysiwyg/upload_file');?>',
                    imageGetJson: '<?php echo site_url('backend_wysiwyg/get_images');?>',
                    imageUploadErrorCallback: function(json)
                    {
                        alert(json.error);
                    },
                    fileUploadErrorCallback: function(json)
                    {
                        alert(json.error);
                    }
              });
        });
        </script>
    </body>
</html>
	