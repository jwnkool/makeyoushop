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
 	1. Function slides home
	2. Function slides add
	3. Function slides edit
	4. Function slides delete
	5. Function slides delete img
	6. Function slides edit cover
 =================================================================
*/

class Backend_slides extends Admin_Controller {
	
	var $template = "backend_admin/admin_template";
	
	var $imagePath = 'uploads/slides/';
	
	function __construct()
	{		
		parent::__construct();
        
        $this->auth->check_access('Admin', true);
		$this->load->model('slides_model');
		$this->load->libraries(array('upload'));
		$this->lang->load('slides');
	}

	/*===============================================================
	 1. Function slides home
 	=================================================================*/	
	function index() {
		
		$data['page_title']	= lang('slideshow');
		
		$config['base_url'] 		= site_url('backend_slides/index/');
		$config['total_rows'] 		= $this->slides_model->count_all();
		$config['per_page'] 		= 10; 
		$config['uri_segment'] 		= 3;
		$config['first_link']		= 'First';
		$config['first_tag_open']	= '<li>';
		$config['first_tag_close']	= '</li>';
		$config['last_link']		= 'Last';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close']	= '</li>';

		$config['full_tag_open']	= '<div class="box-footer clearfix"><ul class="pagination pagination-sm no-margin pull-right">';
		$config['full_tag_close']	= '</ul></div>';
		$config['cur_tag_open']		= '<li class="active"><a href="#">';
		$config['cur_tag_close']	= '</a></li>';
		
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';
		
		$config['prev_link']		= '&laquo;';
		$config['prev_tag_open']	= '<li>';
		$config['prev_tag_close']	= '</li>';

		$config['next_link']		= '&raquo;';
		$config['next_tag_open']	= '<li>';
		$config['next_tag_close']	= '</li>';
		$this->pagination->initialize($config); 
        if ($this->input->get('q')):
            $q = $this->input->get('q');
        else:
            $data['slides'] = $this->slides_model->find_all($config['per_page'], $this->uri->segment(3));
        endif;
		$data['pagination']= $this->pagination->create_links();	
		
		$data['content'] = 'backend_slides/index';
        $this->load->view($this->template, $data);
    }
	
	/*===============================================================
	 2. Function slides add
 	=================================================================*/	
	 function add() {
		
		$data['page_title']	= lang('add_slideshow');
		 
        $this->form_validation->set_rules('title', 'title', 'xss_clean');
		$this->form_validation->set_rules('body', 'body', 'xss_clean');
        $this->form_validation->set_error_delimiters('', '<br/>');
		
        if ($this->form_validation->run() == TRUE) {

			if(isset($_FILES['image']))
					{
					$this->upload->initialize(array(
						'upload_path' => $this->imagePath,
						'allowed_types' => 'png|jpg|gif',
						'max_size' => '2000',
						'max_width' => '3000',
						'max_height' => '3000'
				)); 
		
			if($this->upload->do_upload("image"))
			{
				$image = $this->upload->data();
				$this->image_lib->initialize(array(
					'image_library' => 'gd2',
					'source_image' => $this->imagePath. $image['file_name'],
					'maintain_ratio' => false,
					'create_thumb' => false,
					'quality' => '100%',
					'width' => 1920,
					'height' => 700
				));
				
				if($this->image_lib->resize())
				{
					$image = $this->upload->data();
					$params = array(
						'title' => $this->input->post('title'),
						'body' => $this->input->post('body'),
						'slug' => $this->input->post('slug'),
						'image' => $this->imagePath . $image['file_name']
					);
					
                    $this->slides_model->create($params);
                    $this->session->set_flashdata('success', '
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">	
											&times;</button>
                                        <b>Alert!</b> Success Saved.
                                    ');
                    redirect('backend_slides/index');
					$this->session->flashdata('success');
				}
			}
			else
			{
					$this->session->set_flashdata('error', '
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">	
											&times;</button>
                                        <b>Alert!</b> Failed, image is required.
                                    ');
                	redirect('backend_slides/add');
					$this->session->flashdata('error');
			}
		}
		}
        $data['content'] = 'backend_slides/add';
        $this->load->view($this->template, $data);
	 }
	
	/*===============================================================
	 3. Function slides edit
 	=================================================================*/		
	function edit($id = null) {
		
		$data['page_title']	= lang('edit_slideshow');
			 
		if ($id == null) {
           	$id = $this->input->post('id');
        }
		$this->form_validation->set_rules('title', 'title', 'xss_clean');	
        $this->form_validation->set_error_delimiters('', '<br/>');
		
        if ($this->form_validation->run() == TRUE) {
            $this->slides_model->update($id);
            $this->session->set_flashdata('error', '
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">	
											&times;</button>
                                        <b>Alert!</b> Success Edited.
                                    ');
                	redirect('backend_slides/edit/' .$id);
					$this->session->flashdata('success');
			}
			$data['slides'] = $this->slides_model->findById($id);
			$data['content'] = 'backend_slides/edit';
			$this->load->view($this->template, $data);
		}
		
	/*===============================================================
	 4. Function slides delete
 	=================================================================*/	
		function delete($id = null) {
			if ($id == null) {
				$this->session->set_flashdata('error', 'Invalid post');
				redirect('backend_slides/index');
			} else {
				$post = $this->slides_model->findById($id);
			if (file_exists($post['image'])) {
				unlink($post['image']);
			}
			$this->slides_model->destroy($id);
			$this->session->set_flashdata('success', '
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">	
											&times;</button>
                                        <b>Alert!</b> Success Deleted.
                                    ');
			redirect('backend_slides/index');
			$this->session->flashdata('success');
			}
		}
		
		
	/*===============================================================
	 5. Function slides delete img
 	=================================================================*/		
		function deleteImg($id = null) {
			if ($id == null) {
				$this->session->set_flashdata('error', 'Invalid post');
				redirect('backend_slides/index');
			} else {
				$post = $this->slides_model->findById($id);
			if (file_exists($post['image'])) {
				unlink($post['image']);
			}
			$this->slides_model->destroyImg($id);
			$this->session->set_flashdata('success', '
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">	
											&times;</button>
                                        <b>Alert!</b> Please select new image.
                                    ');
			$this->session->flashdata('success');
									
			$data['slides'] = $this->slides_model->findById($id);
			redirect('backend_slides/imgEdit/' . $id);
			
			}
		}
	
	/*===============================================================
	 6. Function slides edit cover
 	=================================================================*/		
	function imgEdit($id = null) {
		
		$data['page_title']	= lang('edit_slideshow');
			 
		if ($id == null) {
           	$id = $this->input->post('id');
        }
		$this->form_validation->set_rules('title', 'title', 'xss_clean');	
        $this->form_validation->set_error_delimiters('', '<br/>');
		
        if ($this->form_validation->run() == TRUE) {
            $this->slides_model->update($id);
            $slide_id = $id;
		
           if(isset($_FILES['image']))
              	{
					$this->upload->initialize(array(
						'upload_path' => $this->imagePath,
						'allowed_types' => 'png|jpg|gif',
						'max_size' => '2000',
						'max_width' => '3000',
						'max_height' => '3000'
				)); 
			
             if ($this->imagePath . $image['file_name']) {
                    unlink($this->imagePath . $image['file_name']);
                }
				 if($this->upload->do_upload("image"))
					{
						$image = $this->upload->data();
						$this->image_lib->initialize(array(
							'image_library' => 'gd2',
							'source_image' => $this->imagePath. $image['file_name'],
							'maintain_ratio' => false,
							'create_thumb' => false,
							'quality' => '100%',
							'width' => 1920,
							'height' => 700
						));
					
				if($this->image_lib->resize())
				{
					
                    	$image = $this->upload->data();
						$params = array(
							'title' => $this->input->post('title'),
							'body' => $this->input->post('body'),
							'slug' => $this->input->post('slug'),
							'image' => $this->imagePath . $image['file_name']
						);
						
						 $this->slides_model->update($id, $params);
						 $this->session->set_flashdata('success', '
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">	
											&times;</button>
                                        <b>Alert!</b> Success Edited.
                                    ');
						redirect('backend_slides/edit/' . $id);
					$this->session->flashdata('success');
				}
				
			}
			else
			{
					$this->session->set_flashdata('error', '
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">	
											&times;</button>
                                        <b>Alert!</b> Success Edited.
                                    ');
                	redirect('backend_slides/edit/' .$id);
					$this->session->flashdata('success');
			}
		}
		}
			$data['slides'] = $this->slides_model->findById($id);
			$data['content'] = 'backend_slides/imgEdit';
			$this->load->view($this->template, $data);
		}
}