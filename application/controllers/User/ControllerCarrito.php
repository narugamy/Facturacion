<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ControllerCarrito extends CI_Controller{

	private $perfil;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modeluser');
		$this->load->model('Modelproducto');
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

	public function Add(){
		$data=$this->input->post(null,true);
		$carrito=$this->session->userdata('carrito');
		$cantidad=count($carrito);
		$encontrado=false;
		$product=array();
		if(!empty($carrito)){
			for($i=0;$i<$cantidad;$i++){
				if($carrito[$i]['id']==$data['id']){
					$encontrado=true;
					$carrito[$i]['number']=$data['number'];
					$carrito[$i]['price']=$data['price']*$carrito[$i]['number'];
					break;
				}
			}
			if($encontrado==false){
				$product = array('id' => $data['id'], 'number' => $data['number'], 'price' => ($data['price'] * $data['number']), 'name' => $data['name']);
				array_push($carrito, $product);
			}
			$this->session->set_userdata('carrito',$carrito);
		}else{
			$product[]=array('id'=>$data['id'],'number'=>$data['number'],'price'=>($data['price']*$data['number']),'name'=>$data['name']);
			$this->session->set_userdata('carrito',$product);
		}
		$errores['exito']=true;
		$errores['alert']="Se ha agregado Exitoso al producto: ".$data['name']."";
		$errores['url']=base_url()."paneladmin/carrito";
		$errores['alertc']="alert alert-success alert-dismissible";
		echo json_encode($errores);
	}

	public function delete($num=null){
		if(is_numeric($num)){
			$carrito=$this->session->userdata('carrito');
			$cantidad=count($carrito);
			for($i=0;$i<$cantidad;$i++){
				if($carrito[$i]['id']==$num){
					unset($carrito[$i]);
					$carrito=array_values($carrito);
					break;
				}
			}
			$this->session->set_userdata('carrito',$carrito);
			redirect("paneluser/carrito",'refresh');
		}else{
			echo "Error";
		}
	}

	public function Index(){
		$carrito=$this->session->userdata('carrito');
		$alert=$this->input->post(null,true);
		$titulo=['title'=>'Panel de Administrador de Usuarios'];
		$array=['vista'=>'Index','alert'=>$alert,'products'=>$carrito];
		if(!empty($alert)){
			$this->load->view("user/carrito".$array['vista'],$array);
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
		$this->load->view('user/carrito/'.$array['vista'],$array);
		$this->load->view('user/Template/Footer');
	}

	function Update(){
		$data=$this->input->post(null,true);
		$carrito=$this->session->userdata('carrito');
		$cantidad=count($carrito);
		for($i=0;$i<$cantidad;$i++){
			if($carrito[$i]['id']==$data['id']){
				$carrito[$i]['price']=($carrito[$i]['price']/$carrito[$i]['number'])*$data['number'];
				$carrito[$i]['number']=$data['number'];
				break;
			}
		}
		$this->session->set_userdata('carrito',$carrito);
		redirect("paneluser/carrito",'refresh');
	}

}

