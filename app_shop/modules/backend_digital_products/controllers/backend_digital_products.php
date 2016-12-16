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
 	1. Function digital products home
	2. Function digital products form
	3. Function digital products delete
 =================================================================
*/

Class Backend_digital_Products extends Admin_Controller {

	var $template = 'backend_admin/admin_template';
	
	function __construct()
	{
		parent::__construct();
		$this->lang->load('digital_product');
		$this->load->model('digital_product_model');
	}
	
	/*===============================================================
	 1. Function digital products home
 	=================================================================*/
	function index()
	{
		$data['page_title'] = lang('dgtl_pr_header');
		$data['file_list']	= $this->digital_product_model->get_list();
		
		$data['content'] = 'backend_digital_products';
		$this->load->view($this->template, $data);
	}
	
	/*===============================================================
	 2. Function digital products form
 	=================================================================*/
	function form($id=0)
	{
		$this->load->helper('form_helper');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$data	= array(	 'id'				=>''
							,'filename'			=>''
							,'max_downloads'	=>''
							,'title'			=>''
							,'size'				=>''
							);
		if($id)
		{
			$data	= array_merge($data, (array)$this->digital_product_model->get_file_info($id));
		}
		
		$data['page_title']		= lang('digital_products_form');
		
		$this->form_validation->set_rules('max_downloads', 'lang:max_downloads', 'numeric');
		$this->form_validation->set_rules('title', 'lang:title', 'trim|required');

		
		if ($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'backend_digital_product_form';
			$this->load->view($this->template, $data);
		} else {
		
			
			if($id==0)
			{
				$data['file_name'] = false;
				$data['error']	= false;
				
				$config['allowed_types'] = '*';
				$config['upload_path'] = 'uploads/digital_uploads';//$this->config->item('digital_products_path');
				$config['remove_spaces'] = true;
		
				$this->load->library('upload', $config);
				
				if($this->upload->do_upload())
				{
					$upload_data	= $this->upload->data();
				} else {
					$data['error']	= $this->upload->display_errors();
					
					$data['content'] = 'backend_digital_product_form';
					$this->load->view($this->template, $data);
					
					return;
				}
				
				$save['filename']	= $upload_data['file_name'];
				$save['size']		= $upload_data['file_size'];
			} else {
				$save['id']			= $id;
			}
			
			$save['max_downloads']	= set_value('max_downloads');				
			$save['title']			= set_value('title');
			
			$this->digital_product_model->save($save);
			
			redirect('backend_digital_products');
		}
	}
	
	/*===============================================================
	 3. Function digital products delete
 	=================================================================*/
	function delete($id)
	{
		$this->digital_product_model->delete($id);
		
		$this->session->set_flashdata('message', lang('message_deleted_file'));
		redirect('backend_digital_products');
	}

}