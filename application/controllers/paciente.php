<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente extends CI_Controller {

	public function index()
	{
		$lista=$this->paciente_model->lista();
		$data['pacientes']=$lista;

		$this->load->view('inc_head.php'); //archivos de cabecera
		$this->load->view('est_lista',$data); //contenido
		$this->load->view('inc_foder.php'); //archivos de dooter
	}	

		public function test()
	{
		$lista=$this->paciente_model->lista();
		$data['pacientes']=$lista;

		$this->load->view('inc_head.php'); //archivos de cabecera
		$this->load->view('inc_menu.php'); //archivos de cabecera
		$this->load->view('test',$data); //contenido
		$this->load->view('inc_foder.php'); //archivos de dooter
	}	

			public function listapdf()
	{
		$lista=$this->paciente_model->lista();
		$lista=$lista->result();

		$this->pdf=new pdf();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages();
		$this->pdf->SetTitle("Lista de pacientes");
		$this->pdf->SetLeftMargin(15);
		$this->pdf->SetRightMargin(15);
		$this->pdf->SetFillColor(210,210,210);
		$this->pdf->setFont('Arial','B',11);
		$this->pdf->Cell(30);
		$this->pdf->Cell(120,10,'LISTA DE PACIENTES','LTBR',0,'C',1);
		$this->pdf->Ln(20);

			$this->pdf->Cell(8,5,'No.','TBLR',0,'L',1);
			$this->pdf->Cell(50,5,'NOMBRE','TBLR',0,'L',1);
			$this->pdf->Cell(50,5,'PRIMER APELLIDO','TBLR',0,'L',1);
			$this->pdf->Cell(50,5,'SEGUNDO APELLIDO','TBLR',0,'L',1);
			$this->pdf->Cell(14,5,'EDAD','TBLR',0,'L',1);
			$this->pdf->Ln(5);

		$this->pdf->setFont('Arial','',8);

		$num=1;
		foreach ($lista as $row) {
			$nombre=$row->nombre;
			$primerApellido=$row->primerApellido;
			$segundoApellido=$row->segundoApellido;
			$edad=$row->edad;

			$this->pdf->Cell(8,5,$num,'TBLR',0,'L',0);
			$this->pdf->Cell(50,5,$nombre,'TBLR',0,'L',0);
			$this->pdf->Cell(50,5,$primerApellido,'TBLR',0,'L',0);
			$this->pdf->Cell(50,5,$segundoApellido,'TBLR',0,'L',0);
			$this->pdf->Cell(14,5,$edad,'TBLR',0,'L',0);
			$this->pdf->Ln(5);
			$num++;
		}

		$this->pdf->Output("listapacientes.pdg",'I');

	}	

	public function modificar()
	{
		$idPaciente=$_POST['idPaciente'];
		$data['infopaciente']=$this->paciente_model->recuperarPaciente($idPaciente);


		$this->load->view('inc_head.php'); //archivos de cabecera
		$this->load->view('est_modificar',$data); //contenido
		$this->load->view('inc_foder.php'); //archivos de dooter
	}

	public function modificarbd()
	{
		$idPaciente=$_POST['idPaciente'];
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];

		$this->paciente_model->modificarPaciente($idPaciente,$data);

		redirect('paciente/index','refresh');
	}

	public function agregar()
	{
		$this->load->view('inc_head.php'); //archivos de cabecera
		$this->load->view('est_agregar'); //contenido
		$this->load->view('inc_foder.php'); //archivos de dooter
	}

	public function agregarbd() 
	{
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];

		$this->paciente_model->agregarPaciente($data);

		redirect('paciente/index','refresh');
	}

	public function eliminarbd()
	{
		$idPaciente=$_POST['idPaciente'];
		$this->paciente_model->eliminarPaciente($idPaciente);
		redirect('paciente/index','refresh');

	}
}
