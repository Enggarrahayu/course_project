<?php 

defined ('BASEPATH') OR exit('No direct script access allowed');

class student_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->url = new GuzzleHttp\Client(['base_uri' => "http://localhost:8000/api/"]);
		$this->load->model('Student_model');
		$this->load->library('form_validation');
	}
	
	
	public function index()
	{
		// if ($this->input->post('keyword')) {
		// 	$data['mahasiswa'] = $this->mahasiswa_model->cariDataMahasiswa();
		// }
		$data['student']= $this->Student_model->getMahasiswa(); 
		$this->load->view('navbar');
		$this->load->view('student_view', $data);
		$this->load->view('header');
		$this->load->view('footer');
	}
		public function index_api()
	{
        try {
            $response = $this->url->get('student/');
        } catch (GuzzleException $th) {
            echo $th->getMessage();
            return null;
        }
        if ($response->getStatusCode() == 200) {
			$body = json_decode($response->getBody()->getContents(), true);
			$data['show'] = $body['data'];
		// $this->load->view('navbar');
			$this->load->view('student_view', $data);
			$this->load->view('header');
			$this->load->view('footer');
		}
	}
}
 ?>