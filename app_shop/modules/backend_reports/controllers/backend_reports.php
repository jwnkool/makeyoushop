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
 	1. Function reports home
	2. Function customers form
 =================================================================
*/

class Backend_reports extends Admin_Controller {

	var $template = 'backend_admin/admin_template';
	
	//this is used when editing or adding a customer
	var $customer_id	= false;	

	function __construct()
	{		
		parent::__construct();

		$this->auth->check_access('Admin', true);
		
		$this->load->model('Order_model');
		$this->load->model('Search_model');
		$this->load->helper(array('formatting'));
		
		$this->lang->load('report');
	}
	
	/*===============================================================
	 1. Function reports home
 	=================================================================*/
	function index()
	{
		$data['page_title']	= lang('reports');
		$data['years']		= $this->Order_model->get_sales_years();
		
		$data['content'] = 'backend_reports';
        $this->load->view($this->template, $data);
	}
	
	/*===============================================================
	 2. Function reports get best sellers
 	=================================================================*/
	function best_sellers()
	{
		$start	= $this->input->post('start');
		$end	= $this->input->post('end');
		$data['best_sellers']	= $this->Order_model->get_best_sellers($start, $end);
		
		//$data['content'] = 'backend_best_sellers';
        $this->load->view('backend_best_sellers', $data);
	}
	
	/*===============================================================
	 3. Function reports get sales
 	=================================================================*/
	function sales()
	{
		$year			= $this->input->post('year');
		$data['orders']	= $this->Order_model->get_gross_monthly_sales($year);
		
		//$data['content'] = 'backend_sales';
        $this->load->view('backend_sales', $data);
	}

}