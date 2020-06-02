<?php 

defined ('BASEPATH') OR exit('No direct script access allowed');

class teacher_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Teacher_model');
		$this->load->library('form_validation');
	}
	
	
	public function index()
	{
		// if ($this->input->post('keyword')) {
		// 	$data['mahasiswa'] = $this->mahasiswa_model->cariDataMahasiswa();
		// }
		$data['teacher']= $this->Teacher_model->getMahasiswa(); 
		$this->load->view('navbar');
		$this->load->view('teacher_view', $data);
		$this->load->view('header');
		$this->load->view('footer');
	}

	public function tambah(){
		$data = array(
			'title'   => 'Data of Teacher',
			'teacher' => $this->Teacher_model->getMahasiswa()
		);

		$this->form_validation->set_rules('teacher_id', 'Teacher_id', 'required');
		$this->form_validation->set_rules('teacher_name', 'Teacher_name', 'required');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('course_id', 'Course_id', 'required');
		
			if($this->form_validation->run() == false){
				$this->load->view('navbar');
				$this->load->view('teacher/teacher_tambah', $data);
				$this->load->view('header');
				$this->load->view('footer');
			}else{
				$this->Teacher_model->tambahdatamhs();
				// $this->session->set_flashdata('flash-data','ditambahkan');
				redirect('teacher_controller','refresh');
			}
			
		
	}

	public function hapus($id){
		$this->Teacher_model->hapusdatamhs($id);
		$this->session->set_flashdata('flash-data', 'dihapus');
		redirect('teacher_controller', 'refresh');
	}

	public function edit($lec_code){

		$data = array(
			'title'		=> 'Data of Lecturer',
			'teacher'	=> $this->Teacher_model->showLecturer()
			);

		$this->form_validation->set_rules('teacher_id', 'Teacher_id', 'required');
		$this->form_validation->set_rules('teacher_name', 'Teacher_name', 'required');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('course_id', 'Course_id', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('navbar');
			$this->load->view('header');
			$this->load->view('footer');
			$this->load->view('teacher_view', $data);
		}else{
			// echo "data berhasil ditambah";
			$this->Teacher_model->edit();
			$this->session->set_flashdata('flash-data','edited');
			redirect('teacher_controller','refresh');
		}
	}

	
}
 ?>