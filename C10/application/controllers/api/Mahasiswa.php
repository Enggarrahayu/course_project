<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
Use Restserver\libraries\REST_Controller;

/**
 * 
 */
class Mahasiswa extends REST_Controller
{
	
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Mahasiswa_model','mahasiswa');
	}
	public function index_get(){
		$id = $this->get('id');
		if ($id === null) {
			$mahasiswa = $this->mahasiswa->getMahasiswa();
		}else{
			$mahasiswa = $this->mahasiswa->getMahasiswa($id);
		}

		if ($mahasiswa) {
			$this->response([
				'status' => true,
				'data' =>$mahasiswa
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'massage' => 'id not found'
			], REST_Controller:: HTTP_NOT_FOUND);
		}
	}
	public function index_delete(){
		$id = $this->delete('id');

		if ($id===null) {
			$this->response([
				'status' => false,
				'massage' =>'provide an id!'
			], REST_Controller::HTTP_BAD_REQUEST);
		}else{
			if ($this->mahasiswa->deleteMahasiswa($id) > 0) {
				$this->response([
					'status' =>true,
					'id' => $id,
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
			'nim' => $this->post('nim'),
			'nama' => $this->post('nama'),
			'email' => $this->post('email'),
			'jurusan' => $this->post('jurusan'),
		];

		if ($this->mahasiswa->createMahasiswa($data) > 0) {
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
		$id = $this->put('id');
		$data = [
			'nim' => $this->put('nim'),
			'nama' => $this->put('nama'),
			'email' => $this->put('email'),
			'jurusan' => $this->put('jurusan'),
		];

		if ($this->mahasiswa->updateMahasiswa($data, $id) > 0){
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