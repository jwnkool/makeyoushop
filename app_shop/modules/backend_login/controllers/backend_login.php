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
 	1. Function login
	2. Function logout
 =================================================================
*/

class Backend_login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->lang->load('login');
	}
	
	/*============================================================
	1. Function login 
	==============================================================*/
	function index()
	{

		$redirect	= $this->auth->is_logged_in(false, false);
		
		if ($redirect)
		{
			redirect('backend_dashboard');
		}
		
		$data['redirect']	= $this->session->flashdata('redirect');
		$submitted 			= $this->input->post('submitted');
		if ($submitted)
		{
			$username	= $this->input->post('username');
			$password	= $this->input->post('password');
			$remember   = $this->input->post('remember');
			$redirect	= $this->input->post('redirect');
			$login		= $this->auth->login_admin($username, $password, $remember);
			if ($login)
			{
				if ($redirect == '')
				{
					$redirect = 'backend_dashboard';
				}
				redirect($redirect);
			}
			else
			{
				$this->session->set_flashdata('redirect', $redirect);
				$this->session->set_flashdata('error', lang('error_authentication_failed'));
				redirect('backend_login');
			}
		}
		$this->load->view('backend_login', $data);
	}
	
	/*============================================================
	2. Function logout 
	==============================================================*/
	function logout()
	{
		$this->auth->logout();
		$this->session->set_flashdata('message', lang('message_logged_out'));
		redirect('backend_login');
	}

}
