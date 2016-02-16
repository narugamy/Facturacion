<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelproducto extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function get($array=null)
	{
		if(!empty($array['final'])){
			$this->db->order_by("id", "desc");
			$query = $this->db->get('products',$array['final'],$array['inicio']);
			return $query->result();
		}else if(!empty($array['id']) ||!empty($array['name'])){
			$this->db->where($array);
			$query = $this->db->get('products');
			return $query->row();
		}else{
			$this->db->order_by('id', 'desc');
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