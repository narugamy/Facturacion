<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modeluser extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function get($array=null)
	{
		if(!empty($array)){
			if(!empty($array['password'])){
				$array['password']=md5($array['password']);
			}
			$this->db->where($array);
			$query = $this->db->get('users');
			return $query->row();
		}else{
			$query = $this->db->get('users');
			return $query->result();
		}
	}

	function insert($array)
	{
		return $this->db->insert('users', $array);
	}

	function update($array,$id)
	{
		unset($array['id']);
		$this->db->where('id',$id);
		return $this->db->update('users',$array);
	}

	function delete($id)
	{
		$this->db->where($id);
		return $this->db->delete('users');
	}
}