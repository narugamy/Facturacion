<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ControllerUser extends CI_Controller{

	private $perfil;

	public function __construct(){
		parent::__construct();
		$this->load->model('Modeluser');
	}

	public function Actualizar(){
		$user=$this->input->post(null,true);
		$user=$this->Fechas($user,'update');
		$this->Validar(1);
		$errores=array();
		if($this->form_validation->run() == false){
			$error['name']=form_error('name');
			$error['apellidos']=form_error('apellidos');
			$error['nacimiento']=form_error('nacimiento');
			$error['type_id']=form_error('type_id');
			$error['level_id']=form_error('level_id');
			$errores['exito']=false;
			$errores['errores']=$error;
		}else{
			if(empty($error['name']) && empty($error['apellidos']) && empty($error['nacimiento']) && empty($error['type_id']) && empty($error['level_id'])){
				$this->Modeluser->update($user,$user['id']);
				$errores['exito']=true;
				$errores['alert']="Actualizacion Exitosa del usuario: ".$user['email']."";
				$errores['url']=base_url()."paneladmin/user";
				$errores['alertc']="alert alert-success alert-dismissible";
			}
		}
		echo json_encode($errores);
	}

	public function Index(){
		$aler=$this->input->post(null,true);
		$titulo=['title'=>'Panel de Administrador de Usuarios'];
		$array=['vista'=>'Index','alert'=>$aler];
		if(!empty($aler)){
			$this->load->view("user/".$array['vista'],$array);
		}else{
			$this->Vista($array,$titulo);
		}
	}

	function Validar($valor=null){
		$this->form_validation->set_rules('name', 'Nombre', 'trim|required|xss_clean|min_length[6]');
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required|xss_clean|min_length[6]');
		$this->form_validation->set_rules('nacimiento', 'Fecha de Nacimiento', 'trim|required|xss_clean');
		$this->form_validation->set_rules('type_id', 'Rango', 'trim|required|xss_clean|max_length[1]|integer');
		$this->form_validation->set_rules('level_id', 'Nivel', 'trim|required|xss_clean|max_length[1]|integer');
		if(empty($valor)){
			$this->form_validation->set_rules('email', 'Correo', 'trim|required|xss_clean|is_unique[users.email]|min_length[6]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|max_length[15]|min_length[6]');
		}
		$this->form_validation->set_message('is_unique', 'El  %s ya esta en uso');
		$this->form_validation->set_message('required', 'El  %s es requerido');
		$this->form_validation->set_message('integer', 'El  %s solo acepta numeros');
		$this->form_validation->set_message('max_length', 'El  %s tiene mas caracteres de %s caracteres permitidos');
		$this->form_validation->set_message('min_length', 'El  %s acepta como minimo %s caracteres');
	}

	public function Vista($array,$titulo){
		$this->load->view('user/Template/Header',$titulo);
		$this->load->view('user/'.$array['vista'],$array);
		$this->load->view('user/Template/Footer');
	}

	function Update($id=null){
		if(!is_numeric($id)){
			$this->load->view("errores/html/error_404");
		}else{
			$user=$this->Modeluser->getat(array('id'=>$id));
			$titulo=['title'=>"Panel de Administrador editar usuario: $user->name"];
			$array=['vista'=>'Update','user'=>$user,'types'=>$this->Modeltype->get(),'levels'=>$this->Modellevel->get()];
			if($this->input->post('stado',true)==1){
				$this->load->view("admin/users/".$array['vista'],$array);
			}else{
				$this->Vista($array,$titulo);
			}
		}
	}

}

