<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente_model extends CI_Model {

	public function lista()
	{
		$this->db->select('*');
		$this->db->from('pacientes');
		return $this->db->get();
	}

	public function recuperarPaciente($idPaciente)
	{
		$this->db->select('*');
		$this->db->from('pacientes');
		$this->db->where('idPaciente',$idPaciente);
		return $this->db->get();
	}

		public function modificarPaciente($idPaciente,$data)
	{
		$this->db->where('idPaciente',$idPaciente);
		$this->db->update('pacientes',$data);

	}

		public function agregarPaciente($data)
	{
		$this->db->insert('pacientes',$data);

	}
		public function eliminarPaciente($idPaciente)
	{
		$this->db->where('idPaciente',$idPaciente);
		$this->db->delete('pacientes');

	}
}
