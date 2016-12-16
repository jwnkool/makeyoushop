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
 	1. Function admin home
	2. Function admin delete
	3. Function admin form
	4. Function admin cek username
 =================================================================
*/

class Backend_admin extends Admin_Controller
{
	var $template = 'backend_admin/admin_template';
	
	//these are used when editing, adding or deleting an admin
	var $admin_id		= false;
	var $current_admin	= false;
	
	function __construct()
	{
		parent::__construct();
		$this->auth->check_access('Admin', true);
		
		//load the admin language file in
		$this->lang->load('admin');
		
		$this->current_admin	= $this->session->userdata('admin');
	}

	/*===============================================================
	 1. Function admin home
 	=================================================================*/
	function index()
	{
		$data['page_title']	= lang('admins');
		$data['admins']		= $this->auth->get_admin_list();

		$data['content'] = 'backend_admins';
		$this->load->view($this->template, $data);
	}
	
	/*===============================================================
	 2. Function admin delete
 	=================================================================*/
	function delete($id)
	{
		//even though the link isn't displayed for an admin to delete themselves, if they try, this should stop them.
		if ($this->current_admin['id'] == $id)
		{
			$this->session->set_flashdata('message', lang('error_self_delete'));
			redirect('backend_admin');	
		}
		
		//delete the user
		$this->auth->delete($id);
		$this->session->set_flashdata('message', lang('message_user_deleted'));
		redirect('backend_admin');
	}
	
	/*===============================================================
	 3. Function admin form
 	=================================================================*/
	function form($id = false)
	{	
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$data['page_title']		= lang('admin_form');
		
		//default values are empty if the customer is new
		$data['id']		= '';
		$data['firstname']	= '';
		$data['lastname']	= '';
		$data['email']		= '';
		$data['username']	= '';
		$data['access']		= '';
		
		if ($id)
		{	
			$this->admin_id		= $id;
			$admin			= $this->auth->get_admin($id);
			//if the administrator does not exist, redirect them to the admin list with an error
			if (!$admin)
			{
				$this->session->set_flashdata('message', lang('admin_not_found'));
				redirect('backend_admin');
			}
			//set values to db values
			$data['id']			= $admin->id;
			$data['firstname']	= $admin->firstname;
			$data['lastname']	= $admin->lastname;
			$data['email']		= $admin->email;
			$data['username']	= $admin->username;
			$data['access']		= $admin->access;
		}
		
		$this->form_validation->set_rules('firstname', 'lang:firstname', 'trim|max_length[32]');
		$this->form_validation->set_rules('lastname', 'lang:lastname', 'trim|max_length[32]');
		$this->form_validation->set_rules('email', 'lang:email', 'trim|required|valid_email|max_length[128]');
		$this->form_validation->set_rules('username', 'lang:username', 'trim|required|max_length[128]|callback_check_username');
		$this->form_validation->set_rules('access', 'lang:access', 'trim|required');
		
		//if this is a new account require a password, or if they have entered either a password or a password confirmation
		if ($this->input->post('password') != '' || $this->input->post('confirm') != '' || !$id)
		{
			$this->form_validation->set_rules('password', 'lang:password', 'required|min_length[6]|sha1');
			$this->form_validation->set_rules('confirm', 'lang:confirm_password', 'required|matches[password]');
		}
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'backend_admin_form';
			$this->load->view($this->template, $data);
		}
		else
		{
			$save['id']		= $id;
			$save['firstname']	= $this->input->post('firstname');
			$save['lastname']	= $this->input->post('lastname');
			$save['email']		= $this->input->post('email');
			$save['username']	= $this->input->post('username');
			$save['access']		= $this->input->post('access');
			
			if ($this->input->post('password') != '' || !$id)
			{
				$save['password']	= $this->input->post('password');
			}
			
			$this->auth->save($save);
			
			$this->session->set_flashdata('message', lang('message_user_saved'));
			
			//go back to the customer list
			redirect('backend_admin');
		}
	}
	
	/*===============================================================
	 4. Function admin cek username
 	=================================================================*/
	function check_username($str)
	{
		$email = $this->auth->check_username($str, $this->admin_id);
		if ($email)
		{
			$this->form_validation->set_message('check_username', lang('error_username_taken'));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}