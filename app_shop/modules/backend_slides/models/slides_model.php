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
class Slides_model extends CI_Model {
 
	 var $table = 'xtblx_slides';
	 
		function __construct() {
			
			 parent::__construct();
		 }
		 
		function find_all($limit = 2, $offset = 0) {
			$this->db->select('*');
			$this->db->limit($limit, $offset);
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get($this->table);
	
			if ($query->num_rows() > 0) {
				return $query->result_array();
			}
		}
			 
		function findAll() {
			$this->db->select('*');
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get($this->table);
	
			if ($query->num_rows() > 0) {
				return $query->result_array();
			}
		}
		 
		function findById($id) {
			 $this->db->select('*');
			 $this->db->where('id', $id);
			 $query = $this->db->get($this->table, 1);
			 
			if ($query->num_rows() == 1) {
			 return $query->row_array();
			 }
		 }
		
		function count_all(){
			 $query = $this->db->get($this->table);
			return $query->num_rows();
		} 
		
		function create($params = array()) {
			 if (empty($params)) {
				 $data = array(
				 'title' => $this->input->post('title'),
				 'body' => $this->input->post('body'),
				 'slug' => $this->input->post('slug')
			 );
				 $this->db->insert($this->table, $data);
			 } else {
			 	$this->db->insert($this->table, $params);
			 }
		 }
		 
		function update($id, $params) {
			 if (empty($params)) {
				 $data = array(
				 'title' => $this->input->post('title'),
				 'body' => $this->input->post('body'),
				 'slug' => $this->input->post('slug')
			 );
			 
				 $this->db->where('id', $id);
				 $this->db->update($this->table, $data);
			 } else {
				 $this->db->where('id', $id);
				 $this->db->update($this->table, $params);
			 }
		 }
		 
		function destroy($id) {
			 $this->db->where('id', $id);
			 $this->db->delete($this->table);
			 }
			 
		function destroyImg($id) {
			 $this->db->where('image', $image);
			 $this->db->delete($this->table);
			 }	 
}