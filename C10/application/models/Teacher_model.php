<?php

/**
 * 
 */
class Teacher_model extends CI_model
{
	
	public function getMahasiswa()
	{
		return $this->db->get('teacher')->result();
	}

	public function tambahdatamhs(){
		$data = array(
			"teacher_id" => $this->input->post('teacher_id'),
			"teacher_name" => $this->input->post('teacher_name'),
			"subject" => $this->input->post('subject'),
			"course_id" => $this->input->post('course_id')
		);
		$this->db->insert('teacher', $data);
		if ($this->db->affected_rows() > 0) {
			return TRUE ;
		}else{
			return FALSE;
		}
	}

	public function hapusdatamhs($id){
		$this->db->where('teacher_id', $id);
		$this->db->delete('teacher');
	}

	public function edit()
	{
		$data=[
			"teacher_id" => $this->input->post('teacher_id'),
			"teacher_name" => $this->input->post('teacher_name'),
			"subject" => $this->input->post('subject'),
			"course_id" => $this->input->post('course_id')
		];
		$this->db->where('teacher_id', $this->input->post['teacher_id']);
		$this->db->update('teacher', $data);
	}
}