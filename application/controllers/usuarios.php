<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller 
{

	public function index()
	{
		//index.php/controlador/metodo/urisegment3
		//index.php/usuarios/index/2
		$data['msg']=$this->uri->segment(3);

		if($this->session->userdata('login'))
		{
			redirect('usuarios/panel','refresh');
		}
		else
		{
			//cargar un login form
			$this->load->view('inc_head.php'); //archivos de cabecera
			$this->load->view('loginform',$data); //contenido
			$this->load->view('inc_foder.php'); //archivos de dooter
		}		
	}
	public function validarusuario()
	{
		$login=$_POST['login'];
		$password=md5($_POST['password']);

		$consulta=$this->usuario_model->validar($login,$password);

		if($consulta->num_rows()>0)
		{
			foreach ($consulta->result() as $row) 
			{
				//crear las variables de sesion
				$this->session->set_userdata('idusuario',$row->idUsuario);
				$this->session->set_userdata('login',$row->login);
				$this->session->set_userdata('tipo',$row->tipo);
				redirect('usuarios/panel','refresh');
			}
		}
		else
		{
			//sino redirigimos a index enviando 1 en el urisegment 3
			redirect('usuarios/index/1','refresh');
		}
	}


	public function panel()
	{
		if($this->session->userdata('login'))
		{
			redirect('paciente/test','refresh');
		}
		else
		{
			//sino redirigimos a index enviando 1 en el urisegment 3
			redirect('usuarios/index/2','refresh');
		}		

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuarios/index/3','refresh');
	}

}
