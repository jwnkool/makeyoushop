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
Class Search_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	/********************************************************************

	********************************************************************/
	
	function record_term($term)
	{
		$code	= md5($term);
		$this->db->where('code', $code);
		$exists	= $this->db->count_all_results('search');
		if ($exists < 1)
		{
			$this->db->insert('search', array('code'=>$code, 'term'=>$term));
		}
		return $code;
	}
	
	function get_term($code)
	{
		$this->db->select('term');
		$result	= $this->db->get_where('search', array('code'=>$code));
		$result	= $result->row();
		return $result->term;
	}
}