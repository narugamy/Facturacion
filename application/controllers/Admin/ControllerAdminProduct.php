<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ControllerAdminProduct extends CI_Controller{

	private $perfil;

	public function __construct(){
		parent::__construct();
		$this->load->model('Modelproducto');
		$this->perfil=$this->session->userdata('Perfil');
		if($this->perfil!='1' || empty($this->perfil)){
			redirect(base_url());
		}
	}

	public function Create(){
		$title=['title'=>'Panel de Productos'];
		$array=['vista'=>'Create'];
		if(!empty($alert)){
			$this->load->view("admin/products/".$array['vista'],$array);
		}else{
			$this->Vista($array,$title);
		}
	}

	public function Crear(){
		$producto=$this->input->post();
		if(isset($producto['check'])) {
			unset($producto['check']);
			$this->Validation(1);
			if ($this->form_validation->run() == FALSE){
				$producto['image_id'] = 1;
				$title = ['title' => 'Panel de Productos'];
				$array = ['vista' => 'Create'];
				$this->Vista($array, $title);
			}
		}else{
			echo "Necesita imagen";
		}
	}

	public function Index(){
		$alert=$this->input->post(null,true);
		$title=['title'=>'Panel de Productos'];
		$array=['vista'=>'Index','alert'=>$aler];
		if(!empty($alert)){
			$this->load->view("admin/products/".$array['vista'],$array);
		}else{
			$this->Vista($array,$title);
		}
	}

	public function Validation($array=null){
		if(empty($array)){
			echo "Hola";
		}
		$this->form_validation->set_rules('name', 'Nombre', 'required|min_length[5]|is_unique[products.name]');
		$this->form_validation->set_rules('price', 'Precio','required|min_length[1]|is_natural|numeric|integer');
		$this->form_validation->set_rules('stock', 'Stock', 'required|min_length[1]|is_natural|numeric|integer');
		$this->form_validation->set_message('required', 'El campo %s es requerido');
		$this->form_validation->set_message('is_natural', 'El campo %s solo acepta numeros positivos enteros');
		$this->form_validation->set_message('numeric', 'El campo %s solo acepta numeros');
		$this->form_validation->set_message('integer', 'El campo %s no acepta numeros enteros');
		$this->form_validation->set_message('min_length', 'El campo %s solo acepta un maximo de %s caracteres');
		$this->form_validation->set_message('is_unique', 'El dato del campo %s ya esta siendo usado');
	}

	public function Vista($array,$title){
		$this->load->view('admin/Template/Header',$title);
		$this->load->view('admin/products/'.$array['vista'],$array);
		$this->load->view('admin/Template/Footer');
	}

}