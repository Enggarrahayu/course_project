<?php

/**
 * 
 */
class Student_model extends CI_model
{
	
	public function getMahasiswa()
	{
		return $this->db->get('student')->result();
	}

	public function deleteMahasiswa($id){
		$this->db->delete('student',['id' => $id]);
		return $this->db->affected_rows();
	}

	public function createMahasiswa($data){
		$this->db->insert('student', $data);
		return $this->db->affected_rows();
	}

	public function updateMahasiswa($data, $id){
		$this->db->update('student', $data, ['id' => $id]);
		return $this->db->affected_rows();
	}
}