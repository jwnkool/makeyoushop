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
 	1. Function upload image
	2. Function upload file
	3. Function get image
 =================================================================
*/

class Backend_wysiwyg extends Admin_Controller {
	
	/*===============================================================
	 1. Function upload image
 	=================================================================*/	
    function upload_image()
    {
        $config['upload_path'] = 'uploads/wysiwyg/images';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo stripslashes(json_encode($error));
        }
        else
        {
            $data = $this->upload->data();

            //upload successful generate a thumbnail
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'uploads/wysiwyg/images/'.$data['file_name'];
            $config['new_image'] = 'uploads/wysiwyg/thumbnails/'.$data['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['width']     = 75;
            $config['height']   = 50;

            $this->load->library('image_lib', $config); 

            $this->image_lib->resize();

            
            $data = array('filelink' => base_url('uploads/wysiwyg/images/'.$data['file_name']), 'filename'=>$data['file_name']);
            echo stripslashes(json_encode($data));
        }
    }

	/*===============================================================
	 2. Function upload file
 	=================================================================*/	
    function upload_file()
    {
        $config['upload_path'] = 'uploads/wysiwyg';
        $config['allowed_types'] = '*';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo stripslashes(json_encode($error));
        }
        else
        {
            $data = $this->upload->data();
            $data = array('filelink' => base_url('uploads/wysiwyg/'.$data['file_name']), 'filename'=>$data['file_name']);
            echo stripslashes(json_encode($data));
        }
    }

	/*===============================================================
	 3. Function get image
 	=================================================================*/	
    function get_images()
    {
        $files = get_filenames('uploads/wysiwyg/thumbnails');

        $return = array();
        foreach($files as $file)
        {
            $return[] = array('thumb'=>base_url('uploads/wysiwyg/thumbnails/'.$file), 'image'=>base_url('uploads/wysiwyg/images/'.$file));
        }
        echo stripslashes(json_encode($return));
    }

}