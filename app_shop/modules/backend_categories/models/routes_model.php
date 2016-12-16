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
*/
class Routes_model extends CI_Model {

	function __construct()
	{
		parent::__construct();		
	}
	

	// save or update a route and return the id
	function save($route)
	{
		if(!empty($route['id']))
		{
			$this->db->where('id', $route['id']);
			$this->db->update('routes', $route);
			
			return $route['id'];
		}
		else
		{
			$this->db->insert('routes', $route);
			return $this->db->insert_id();
		}
	}
	
	function check_slug($slug, $id=false)
	{
		if($id)
		{
			$this->db->where('id !=', $id);
		}
		$this->db->where('slug', $slug);
		
		return (bool) $this->db->count_all_results('routes');
	}
	
	function validate_slug($slug, $id=false, $count=false)
	{
		if($this->check_slug($slug.$count, $id))
		{
			if(!$count)
			{
				$count	= 1;
			}
			else
			{
				$count++;
			}
			return $this->validate_slug($slug, $id, $count);
		}
		else
		{
			return $slug.$count;
		}
	}
	
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('routes');
	}
}