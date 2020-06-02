<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
Use Restserver\libraries\REST_Controller;

class Course extends REST_Controller
{
	
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Course_model','course');
	}
	public function index_get(){
		$id = $this->get('course_id');
		if ($id === null) {
			$course = $this->course->showLecturer();
		}else{
			$course = $this->course->showLecturer($id);
		}

		if ($course) {
			$this->response([
				'status' => true,
				'data' =>$course
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'massage' => 'id not found'
			], REST_Controller:: HTTP_NOT_FOUND);
		}
	}

	public function index_delete(){
		$id = $this->delete('course_id');

		if ($id===null) {
			$this->response([
				'status' => false,
				'massage' =>'provide an id!'
			], REST_Controller::HTTP_BAD_REQUEST);
		}else{
			if ($this->course->deleteMahasiswa($id) > 0) {
				$this->response([
					'status' =>true,
					'course_id' => $id,
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
			'course_id' => $this->post('course_id'),
			'course_name' => $this->post('course_name'),
			'price' => $this->post('price'),
			'course_image' => $this->post('course_image'),
		];

		if ($this->course->createMahasiswa($data) > 0) {
			$this->response([
				'status' => true,
				'massage' => 'new mahasiswa has been created'
			], REST_Controller::HTTP_CREATED);
		}else{
			$this->response([
				'status' => false,
				'massage' => 'failed to create new data!'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}
	public function index_put(){
		$id = $this->put('course_id');
		$data = [
			'course_id' => $this->post('course_id'),
			'course_name' => $this->post('course_name'),
			'price' => $this->post('price'),
			'course_image' => $this->post('course_image'),
		];

		if ($this->course->updateMahasiswa($data, $id) > 0){
			$this->response([
				'status' =>true,
				'massage' => 'data mahasiswa has been updated'
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'massage' => 'failed to update data!'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}
}