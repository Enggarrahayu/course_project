<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_model extends CI_Model {
	
	public function showLecturer($value='')
	{
		$query =  $this->db->order_by('course_id','ASC')->get('course');
        return $query->result();
	}

	function insert_data(){
		$data=[
			"course_id" => $this->input->post('course_id',true),
			"course_name" => $this->input->post('course_name',true),
			"price" => $this->input->post('price',true),
			"course_desc" => $this->input->post('course_desc',true),
			
		];
		$this->db->insert('course', $data);
		// $this->db->insert($table,$data);
	}

	public function delete_lecturer($course_id){
		$this->db->where('course_id', $course_id);
		$this->db->delete('course');
	}

	public function edit_lecturer()
	{
		$data=[
			"course_id" => $this->input->post('course_id',true),
			"course_name" => $this->input->post('course_name',true),
			"price" => $this->input->post('price',true)
			
		];
		$this->db->where('course_id', $this->input->post['course_id']);
		$this->db->update('course', $data);
	}
	
	

}