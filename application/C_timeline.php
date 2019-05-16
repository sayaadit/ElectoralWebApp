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
}
?>