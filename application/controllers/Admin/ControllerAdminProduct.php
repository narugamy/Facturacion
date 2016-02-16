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

	public function Crear(){
		$producto=$this->input->post(null,true);
		$producto=$this->Fechas($producto,'');
		$error=['name'=>'','price'=>'','stock'=>'','image_id'=>''];
		$enviar=['exito'=>false];

			$this->Validation();
			if ($this->form_validation->run() == FALSE){
				$error['name']=form_error('name');
				$error['price']=form_error('price');
				$error['stock']=form_error('stock');
			}else{
				if(empty($error['name']) && empty($error['price']) && empty($error['stock']) && empty($error['image_id'])){
					if(empty($producto['check'])){
						$config['upload_path'] = './assets/images/';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size'] = '2000';
						$config['max_width'] = '2024';
						$config['max_height'] = '2008';
						$this->load->library('upload', $config);
						if(!$this->upload->do_upload('image_id')){
							$error['image_id']=$this->upload->display_errors();
						}else{
							$file_info = $this->upload->data();
							$this->Create_thumbnail($file_info['file_name']);
							$data = array('upload_data' => $this->upload->data());
							$nombre = $file_info['file_name'];
							$image=['name'=>$nombre];
							$image=$this->fechas($image,'create');
							$id=$this->Modelimage->insert($image);
							$producto['image_id']=$id;
						}
					}else{
						unset($producto['check']);
						$producto['image_id']=1;
					}
					$this->Modelproducto->insert($producto);
					$enviar['exito']=true;
					$enviar['alert']="Creacion exitosa del producto: ".$producto['name']."";
					$enviar['url']=base_url()."paneladmin/products";
					$enviar['alertc']="alert alert-success alert-dismissible";
				}
			}
		$enviar['errores']=$error;
		echo json_encode($enviar);
	}

	function Create_thumbnail($filename){
		$config['image_library'] = 'gd2';
		$config['source_image'] = 'assets/images/'.$filename;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['new_image']='assets/images/thumbs/';
		$config['width'] = 150;
		$config['height'] = 150;
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
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

	function Fechas($array,$accion=null){
		if($accion!="update"){
			$array['created_at']=date('Y-m-d H:i:s');
		}
		$array['updated_at']=date('Y-m-d H:i:s');
		return $array;
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
		$array=['vista'=>'Index','alert'=>$alert,'productos'=>$this->getProduct()];
		if(!empty($alert)){
			$this->load->view("admin/products/".$array['vista'],$array);
		}else{
			$this->Vista($array,$title);
		}
	}

	public function Validation(){
		$this->form_validation->set_rules('name', 'Nombre', 'required|min_length[5]|is_unique[products.name]');
		$this->form_validation->set_rules('price', 'Precio','required|min_length[1]|decimal|numeric');
		$this->form_validation->set_rules('stock', 'Stock', 'required|min_length[1]|numeric|integer|is_natural');
		$this->form_validation->set_message('required', 'El campo %s es requerido');
		$this->form_validation->set_message('is_natural', 'El campo %s solo acepta numeros positivos enteros');
		$this->form_validation->set_message('numeric', 'El campo %s solo acepta numeros');
		$this->form_validation->set_message('decimal', 'El campo %s solo acepta decimales');
		$this->form_validation->set_message('integer', 'El campo %s no acepta numeros enteros');
		$this->form_validation->set_message('min_length', 'El campo %s solo acepta un maximo de %s caracteres');
		$this->form_validation->set_message('is_unique', 'El dato del campo %s ya esta siendo usado');
	}

	public function Vista($array,$title){
		$this->load->view('admin/Template/Header',$title);
		$this->load->view('admin/products/'.$array['vista'],$array);
		$this->load->view('admin/Template/Footer');
	}

	public function VistaProduct($id)
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