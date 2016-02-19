<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ControllerUserProduct extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Modelproducto');
	}

	public function getProduct($array=null)
	{
		if(empty($array)){
			$productos=$this->Modelproducto->get();
		}else{
			$productos=$this->Modelproducto->get($array);
		}
		return $productos;
	}

	public function Index(){
		$alert=$this->input->post(null,true);
		$title=['title'=>'Panel de Productos'];
		if(empty($alert['name'])){
			$dato=$this->getProduct();
		}else{
			$dato=$this->getProduct($alert['name']);
		}
		$array=['vista'=>'Index','alert'=>$alert,'productos'=>$dato];
		if(!empty($alert['stado'])){
			$this->load->view('user/products/'.$array['vista'],$array);
		}else{
			$this->Vista($array,$title);
		}
	}

	public function Vista($array,$titulo){
		$this->load->view('user/Template/Header',$titulo);
		$this->load->view('user/products/'.$array['vista'],$array);
		$this->load->view('user/Template/Footer');
	}

	public function VistaProduct($id=null)
	{
		$product=$this->getProduct(array('id'=>$id));
		if(is_numeric($id)){
			$title=['title'=>'Articulo: '.$product->name];
			$array=['vista'=>'Vista','product'=>$product];
			if(!empty($alert)){
				$this->load->view("admin/products/".$array['vista'],$array);
			}else{
				$this->Vista($array,$title);
			}
		}else{

		}
	}

}