<?php 
/**
*
*/
class C_timeline extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_timeline');
	}
	public function index()
	{
		$data = array(
			'title' => 'Data Timeline',
			'data_timeline' => $this->M_timeline->get_data()
		);
		$this->load->view('timeline',$data);
	}

	public function add()
	{
		$data = $this->input->post(null, TRUE);
		$insert = $this->M_timeline->save_data($data);
		if ($insert) {
			$this->session->set_flashdata('alert','sukses insert');
			redirect('C_timeline/index');
		}else{
			echo "<script>alert('Gagal Menambahkan data')</script>";
		}
	}

	public function edit()
	{
		$data = $this->input->post(null,TRUE);
		$edit = $this->M_timeline->edit_data($data);
		if($edit){
			$this->session->set_flashdata('alert', 'sukses edit');
			redirect('C_timeline/index');
		}else{
			echo "<script>alert('Gagal Edit Data');</script>";
		}
	}

	public function delete()
	{
		$idx = $this->input->post('idx');
		$hapus = $this->M_timeline->delete_data($idx);
		if($hapus){
			$this->session->set_flashdata('alert', 'sukses hapus');
			redirect('C_timeline/index');
		}else{
			echo "<script>alert('Gagal Hapus Data');</script>";
		}
	}

}
