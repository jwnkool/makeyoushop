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
 	1. Function pages home
	2. Function pages form
	3. Function pages form link
	4. Function pages form delete
 =================================================================
*/

class Backend_pages extends Admin_Controller
{
	
	var $template = 'backend_admin/admin_template';
	
	function __construct()
	{
		parent::__construct();

		$this->auth->check_access('Admin', true);
		$this->load->model('Page_model');
		$this->lang->load('page');
	}
	
	/*===============================================================
	 1. Function pages home
 	=================================================================*/	
	function index()
	{
		$data['page_title']	= lang('pages');
		$data['pages']		= $this->Page_model->get_pages();
		
		$data['content'] = 'backend_pages';
        $this->load->view($this->template, $data);
	}
	
	/*===============================================================
	 2. Function pages form
 	=================================================================*/	
	function form($id = false)
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		//set the default values
		$data['id']				= '';
		$data['title']			= '';
		$data['menu_title']		= '';
		$data['slug']			= '';
		$data['sequence']		= 0;
		$data['parent_id']		= 0;
		$data['content_pages']	= '';
		$data['seo_title']		= '';
		$data['meta']			= '';
		
		$data['page_title']	= lang('page_form');
		$data['pages']		= $this->Page_model->get_pages();
		
		if($id)
		{
			
			$page			= $this->Page_model->get_page($id);

			if(!$page)
			{
				//page does not exist
				$this->session->set_flashdata('error', lang('error_page_not_found'));
				redirect('backend_pages');
			}
			
			
			//set values to db values
			$data['id']				= $page->id;
			$data['parent_id']		= $page->parent_id;
			$data['title']			= $page->title;
			$data['menu_title']		= $page->menu_title;
			$data['sequence']		= $page->sequence;
			$data['content_pages']	= $page->content_pages;
			$data['seo_title']		= $page->seo_title;
			$data['meta']			= $page->meta;
			$data['slug']			= $page->slug;
		}
		
		$this->form_validation->set_rules('title', 'lang:title', 'trim|required');
		$this->form_validation->set_rules('menu_title', 'lang:menu_title', 'trim');
		$this->form_validation->set_rules('slug', 'lang:slug', 'trim');
		$this->form_validation->set_rules('seo_title', 'lang:seo_title', 'trim');
		$this->form_validation->set_rules('meta', 'lang:meta', 'trim');
		$this->form_validation->set_rules('sequence', 'lang:sequence', 'trim|integer');
		$this->form_validation->set_rules('parent_id', 'lang:parent_id', 'trim|integer');
		$this->form_validation->set_rules('content_pages', 'lang:content', 'trim');
		
		// Validate the form
		if($this->form_validation->run() == false)
		{
			$data['content'] = 'backend_page_form';
			$this->load->view($this->template, $data);
		}
		else
		{
			$this->load->helper('text');
			
			//first check the slug field
			$slug = $this->input->post('slug');
			
			//if it's empty assign the name field
			if(empty($slug) || $slug=='')
			{
				$slug = $this->input->post('title');
			}
			
			$slug	= url_title(convert_accented_characters($slug), 'dash', TRUE);
			
			//validate the slug
			$this->load->model('Routes_model');
			if($id)
			{
				$slug		= $this->Routes_model->validate_slug($slug, $page->route_id);
				$route_id	= $page->route_id;
			}
			else
			{
				$slug			= $this->Routes_model->validate_slug($slug);
				$route['slug']	= $slug;	
				$route_id		= $this->Routes_model->save($route);
			}
			
			
			$save = array();
			$save['id']				= $id;
			$save['parent_id']		= $this->input->post('parent_id');
			$save['title']			= $this->input->post('title');
			$save['menu_title']		= $this->input->post('menu_title'); 
			$save['sequence']		= $this->input->post('sequence');
			$save['content_pages']	= $this->input->post('content_pages');
			$save['seo_title']		= $this->input->post('seo_title');
			$save['meta']			= $this->input->post('meta');
			$save['route_id']		= $route_id;
			$save['slug']			= $slug;
			
			//set the menu title to the page title if if is empty
			if ($save['menu_title'] == '')
			{
				$save['menu_title']	= $this->input->post('title');
			}
			
			//save the page
			$page_id	= $this->Page_model->save($save);
			
			//save the route
			$route['id']	= $route_id;
			$route['slug']	= $slug;
			$route['route']	= 'cart/page/'.$page_id;
			
			$this->Routes_model->save($route);
			
			$this->session->set_flashdata('message', lang('message_saved_page'));
			
			//go back to the page list
			redirect('backend_pages');
		}
	}
	
	/*===============================================================
	 3. Function pages form link
 	=================================================================*/	
	function link_form($id = false)
	{
	
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		//set the default values
		$data['id']			= '';
		$data['title']		= '';
		$data['url']		= '';
		$data['new_window']	= false;
		$data['sequence']	= 0;
		$data['parent_id']	= 0;

		
		$data['page_title']	= lang('link_form');
		$data['pages']		= $this->Page_model->get_pages();
		if($id)
		{
			$page			= $this->Page_model->get_page($id);

			if(!$page)
			{
				//page does not exist
				$this->session->set_flashdata('error', lang('error_link_not_found'));
				redirect('backend_pages');
			}
			
			
			//set values to db values
			$data['id']			= $page->id;
			$data['parent_id']	= $page->parent_id;
			$data['title']		= $page->title;
			$data['url']		= $page->url;
			$data['new_window']	= (bool)$page->new_window;
			$data['sequence']	= $page->sequence;
		}
		
		$this->form_validation->set_rules('title', 'lang:title', 'trim|required');
		$this->form_validation->set_rules('url', 'lang:url', 'trim|required');
		$this->form_validation->set_rules('sequence', 'lang:sequence', 'trim|integer');
		$this->form_validation->set_rules('new_window', 'lang:new_window', 'trim|integer');
		$this->form_validation->set_rules('parent_id', 'lang:parent_id', 'trim|integer');
		
		// Validate the form
		if($this->form_validation->run() == false)
		{
			$data['content'] = 'backend_link_form';
			$this->load->view($this->template, $data);
		}
		else
		{	
			$save = array();
			$save['id']			= $id;
			$save['parent_id']	= $this->input->post('parent_id');
			$save['title']		= $this->input->post('title');
			$save['menu_title']	= $this->input->post('title'); 
			$save['url']		= $this->input->post('url');
			$save['sequence']	= $this->input->post('sequence');
			$save['new_window']	= $this->input->post('new_window');
			
			//save the page
			$this->Page_model->save($save);
			
			$this->session->set_flashdata('message', lang('message_saved_link'));
			
			//go back to the page list
			redirect('backend_pages');
		}
	}
	
	/*===============================================================
	 4. Function pages delete
 	=================================================================*/	
	function delete($id)
	{
		
		$page	= $this->Page_model->get_page($id);
		
		if($page)
		{
			$this->load->model('Routes_model');
			
			$this->Routes_model->delete($page->route_id);
			$this->Page_model->delete_page($id);
			$this->session->set_flashdata('message', lang('message_deleted_page'));
		}
		else
		{
			$this->session->set_flashdata('error', lang('error_page_not_found'));
		}
		
		redirect('backend_pages');
	}
}	