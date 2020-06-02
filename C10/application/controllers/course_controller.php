<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class course_controller extends CI_Controller
{
	

public function __construct()
		{
			parent::__construct();
			$this->load->model('Course_model');
			$this->load->library('form_validation');
			// $this->load->library('session');
			// $this->load->library('upload');
			// $this->load->library('Excel');
			// $this->load->helper('file');
		}

	public function index()
	{
		$data = array(
			'title'		=> 'Data of Position',
			'course'	=> $this->Course_model->showLecturer()
			);

		$this->load->view('course_view',$data);
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('footer');
	}

	public function insert()
	{
		$data = array(
			'title'		=> 'Data of Lecturer',
			'course'	=> $this->Course_model->showLecturer()
			);
		
		$this->form_validation->set_rules('course_id', 'Course_id', 'required');
		$this->form_validation->set_rules('course_name', 'Course_name', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('course_desc', 'Course_desc', 'required');
		
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('navbar');
			$this->load->view('header');
			$this->load->view('footer');
			$this->load->view('course_view', $data);
		}else{
			// echo "data berhasil ditambah";
			$this->Course_model->insert_data();
			$this->session->set_flashdata('flash-data','Added');
			redirect('course_controller','refresh');
		}
		// $lec_code = $this->input->post('lec_code');
		// $lec_name = $this->input->post('lec_name');
		// $nip = $this->input->post('nip');
		// $nidn = $this->input->post('nidn');
		// $distribution = $this->input->post('distribution');
 	// 	$distribution_even = $this->input->post('distribution_even');
 	// 	$phone_number = $this->input->post('phone_number');
 	// 	$subject = $this->input->post('subject');
 	// 	$status = $this->input->post('status');


		// $data = array(
		// 	'lec_code' => $lec_code,
		// 	'lec_name' => $lec_name,
		// 	'nip' => $nip,
		// 	'nidn' => $nidn,
		// 	'distribution' => $distribution,
		// 	'distribution_even' => $distribution_even,
		// 	'phone_number' => $phone_number,
		// 	'subject' => $subject,
		// 	'status' => $status
		// 	);
		// $this->lec_model->insert_data($data,'lecturer');
		// redirect('content/lecdata',$data);

	}

	public function delete($position_id){
		$this->Course_model->delete_lecturer($position_id);
		$this->session->set_flashdata('flash-data', 'deleted');
		redirect('course_controller', 'refresh');
	}

	public function edit($lec_code){

		$data = array(
			'title'		=> 'Data of Lecturer',
			'course'	=> $this->Course_model->showLecturer()
			);

		$this->form_validation->set_rules('course_id', 'Course_id', 'required');
		$this->form_validation->set_rules('course_name', 'Course_name', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('navbar');
			$this->load->view('header');
			$this->load->view('footer');
			$this->load->view('course_view', $data);
		}else{
			// echo "data berhasil ditambah";
			$this->Course_model->edit_lecturer();
			$this->session->set_flashdata('flash-data','edited');
			redirect('course','refresh');
		}
	}
}

 ?>