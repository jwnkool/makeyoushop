<?php
/*
 *===============================================================
 * DEVELOPMENT BY JWN KOOL
 *===============================================================
 *
 * @package			CodeIgniter
 * @author			ExpressionEngine Dev Team
 * @copyright		Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @link			http://codeigniter.com
 * @version			2.1.4 
 *----------------------------------------------------------------
 * @platform		Gocart
 * @author			Clear Sky Designs
 * @copyright		Copyright (c) 2008 - 2011, Clear Sky Designs, 
 *					LLC All rights reserved.
 * @link			http://gocartdv.com
 * @version			2.3.3
 *----------------------------------------------------------------
 * @Modular			Modular Extensions - HMVC
 * @author			Wiredesignz
 * @copyright		Copyright (c) 2011 Wiredesignz.
 * @version 		5.4
 *----------------------------------------------------------------
 * @Development		@JWNKOOL | 2016
 *----------------------------------------------------------------
 =================================================================
 * Index of function :
 -----------------------------------------------------------------
 	1. Function dashboard home
	1. Function dashboard about system
 =================================================================
*/


class Backend_dashboard extends Admin_Controller {
	
	var $template = 'backend_admin/admin_template';
	
	function __construct()
	{
		parent::__construct();

		if($this->auth->check_access('Orders'))
		{
			redirect('backend_orders');
		}
		
		$this->load->model('Order_model');
		$this->load->model('Customer_model');
		$this->load->helper('date');
		
		$this->lang->load('dashboard');
	}
	/*===============================================================
	 1. Function dashboard home
 	=================================================================*/
	function index()
	{
		//check to see if shipping and payment modules are installed
		$data['payment_module_installed']	= (bool)count($this->Settings_model->get_settings('payment_modules'));
		$data['shipping_module_installed']	= (bool)count($this->Settings_model->get_settings('shipping_modules'));
		
		$data['page_title']	=  lang('dashboard');
		
		// get 5 latest orders
		$data['orders']	= $this->Order_model->get_orders(false, '' , 'DESC', 5);

		// get 5 latest customers
		$data['customers'] = $this->Customer_model->get_customers(5);
				
		$data['content'] = 'backend_dashboard';
        $this->load->view($this->template, $data);
	}
	/*===============================================================
	 2. Function dashboard about system
 	=================================================================*/
	function about_system()
	{
		$data['page_title']	=  lang('about_system');		
		
		$data['content'] = 'backend_about_system';
        $this->load->view($this->template, $data);
	}
}