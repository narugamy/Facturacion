<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ControllerUserProduct extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Modelproducto');
	}

	public function Index(){
		$aler=$this->input->post(null,true);
		$titulo=['title'=>'Panel de Productos'];
		$array=['vista'=>'Index','alert'=>$aler];
		if(!empty($aler)){
			$this->load->view("user/".$array['vista'],$array);
		}else{
			$this->Vista($array,$titulo);
		}
	}

	public function Vista($array,$titulo){
		$this->load->view('user/Template/Header',$titulo);
		$this->load->view('user/products/'.$array['vista'],$array);
		$this->load->view('user/Template/Footer');
	}

}