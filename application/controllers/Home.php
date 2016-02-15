<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('Modelimage');
		//$this->load->model('Modeltype');
		$this->load->model('Modeluser');
		if(empty($this->session->userdata('Perfil'))){
			$this->session->set_userdata('Perfil','vista');
		}
	}

	public function Crear(){
		$errores=array();
		$this->Validar("");
		$user=$this->input->post(null,true);
		$user['password']=md5($user['password']);
		if($this->form_validation->run() == false){
			$error['name']=form_error('name');
			$error['apellidos']=form_error('apellidos');
			$error['email']=form_error('email');
			$error['password']=form_error('password');
			$error['nacimiento']=form_error('nacimiento');
			$error['type_id']=form_error('type_id');
			$error['level_id']=form_error('level_id');
			$errores['exito']=false;
			$errores['errores']=$error;
		}else{
			if(empty($error['name']) && empty($error['apellidos']) && empty($error['email']) && empty($error['password']) && empty($error['nacimiento']) && empty($error['type_id']) && empty($error['level_id'])){
				$config['upload_path'] = './assets/images/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2000';
				$config['max_width'] = '2024';
				$config['max_height'] = '2008';
				$this->load->library('upload', $config);
				//SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
				if(!$this->upload->do_upload('image_id')){
						$error['image_id']=$this->upload->display_errors();
						$errores['errores']=$error;
				}else{
					$errores['exito']=true;
					$file_info = $this->upload->data();
					$this->Create_thumbnail($file_info['file_name']);
					$data = array('upload_data' => $this->upload->data());
					$nombre = $file_info['file_name'];
					$image=['name'=>$nombre];
					$image=$this->fechas($image,'create');
					$id=$this->Modelimage->insert($image);
					$user['image_id']=$id;
					$user=$this->fechas($user,'create');
					$this->Modeluser->insert($user);
					$errores['exito']=true;
					$errores['alert']="Registro Exitoso del usuario: ".$user['email']."";
					$errores['url']=base_url()."paneladmin/user";
					$errores['alertc']="alert alert-success alert-dismissible";
				}
			}
		}
		echo json_encode($errores);
	}

	public function Create(){
		$titulo=['title'=>'Panel de Administrador de Usuarios'];
		$array=['vista'=>'Create'];
		if($this->input->post('stado',true)==1){
			$this->load->view("front/".$array['vista'],$array);
		}else{
			$this->Vista($array,$titulo);
		}
	}

	public function Index()
	{
		$titulo=['title'=>'By KiritoM@ster'];
		$array=['vista'=>'Login'];
		if($this->input->post('stado',true)==1){
			$this->load->view("front/".$array['vista'],$array);
		}else{
			$this->Vista($array,$titulo);
		}
	}

	public function Login(){
		$this->Reglas('');
		$er=['email'=>'','password'=>''];
		$error=['exito'=>false];
		if($this->form_validation->run() == FALSE){
			$er['email']=form_error('email');
			$er['password']=form_error('password');
			
		}else{
			if(empty($er['email']) && empty($er['password'])){
				$user=$this->Modeluser->get($this->input->post(null,true));
				if($user!=NULL){
					$error['exito']=true;
					$data = array(
						'is_logued_in'	=>		TRUE,
						'id'			=>		$user->id,
						'Perfil'		=>		$user->type_id,
						'Nombre'		=>		$user->name,
						'Apellidos'		=>		$user->apellidos,
						'Img'			=>		$user->image_id
					);
					$this->session->set_userdata($data);
					$error['url']=base_url()."paneluser";
				}else{
					$error['data']=$user;
					$error['general']="Verifique sus datos por favor";
				}
			}
		}
		$error['errores']=$er;
		echo json_encode($error);
	}

	function Reglas($dato=null){
		$this->form_validation->set_rules('password', 'password', 'trim|min_length[6]|max_length[15]|required');
		if(!empty($dato)){
			$this->form_validation->set_rules('email', 'Correo', 'trim|required|xss_clean|is_unique[users.email]|min_length[6]');
			$this->form_validation->set_rules('name', 'Nombre', 'trim|required|xss_clean|min_length[6]');
			$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required|xss_clean|min_length[6]');
			$this->form_validation->set_rules('nacimiento', 'Fecha de Nacimiento', 'trim|required|xss_clean');
			$this->form_validation->set_message('is_unique', 'El  %s ya esta en uso');
		}else{
			$this->form_validation->set_rules('email', 'Correo', 'trim|valid_email|min_length[15]|max_length[150]|required');
		}
		$this->form_validation->set_message('required', 'El  %s es requerido');
		$this->form_validation->set_message('max_length', 'El  %s tiene mas caracteres de %s caracteres permitidos');
		$this->form_validation->set_message('min_length', 'El  %s acepta como minimo %s caracteres');
	}

	public function Vista($array,$titulo){
		$this->load->view('front/Template/Header',$titulo);
		$this->load->view('front/'.$array['vista'],$array);
		$this->load->view('front/Template/Footer');
	}

}
