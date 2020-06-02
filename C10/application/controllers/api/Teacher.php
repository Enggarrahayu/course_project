<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
Use Restserver\libraries\REST_Controller;

/**
 * 
 */
class Teacher extends REST_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Teacher_model','teacher');
	}
	
	public function index_get(){
		$id = $this->get('id');
		if ($id === null) {
			$teacher = $this->teacher->getMahasiswa();
		}else{
			$teacher = $this->teacher->getMahasiswa($id);
		}

		if ($teacher) {
			$this->response([
				'status' => true,
				'data' =>$teacher
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'massage' => 'id not found'
			], REST_Controller:: HTTP_NOT_FOUND);
		}
	}

	public function index_delete(){
		$id = $this->delete('teacher_id');

		if ($id===null) {
			$this->response([
				'status' => false,
				'massage' =>'provide an id!'
			], REST_Controller::HTTP_BAD_REQUEST);
		}else{
			if ($this->teacher->deleteMahasiswa($id) > 0) {
				$this->response([
					'status' =>true,
					'teacher_id' => $id,
					'massage' => 'deleted.'
				], REST_Controller::HTTP_OK);
			}else{
				$this->response([
					'status' => false,
					'massage' => 'id not found!'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}

	public function index_post(){
		$data = [
			'teacher_id' => $this->post('teacher_id'),
			'teacher_name' => $this->post('teacher_name'),
			'email' => $this->post('email'),
			'subject_course' => $this->post('subject_course'),
			'address' => $this->post('address'),
			'phone_number' => $this->post('phone_number'),
		];

		if ($this->teacher->createMahasiswa($data) > 0) {
			$this->response([
				'status' => true,
				'massage' => 'new student has been created'
			], REST_Controller::HTTP_CREATED);
		}else{
			$this->response([
				'status' => false,
				'massage' => 'failed to create new data!'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}
	public function index_put(){
		$id = $this->put('id');
		$data = [
			'teacher_id' => $this->post('teacher_id'),
			'teacher_name' => $this->post('teacher_name'),
			'email' => $this->post('email'),
			'subject_course' => $this->post('subject_course'),
			'address' => $this->post('address'),
			'phone_number' => $this->post('phone_number'),
		];

		if ($this->teacher->updateMahasiswa($data, $id) > 0){
			$this->response([
				'status' =>true,
				'massage' => 'data student has been updated'
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'massage' => 'failed to update data!'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

}