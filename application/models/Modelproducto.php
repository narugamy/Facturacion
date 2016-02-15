<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelproducto extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function get($array=null)
	{
		if(!empty($array)){
			$this->db->where($array);
			$query = $this->db->get('products');
			return $query->row();
		}else{
			$query = $this->db->get('products');
			return $query->result();
		}
	}

	function insert($array)
	{
		return $this->db->insert('products', $array);
	}

	function update($array,$id)
	{
		unset($array['id']);
		$this->db->where($id);
		return $this->db->update('products',$array);
	}

	function delete($id)
	{
		$this->db->where($id);
		return $this->db->delete('products');
	}
}