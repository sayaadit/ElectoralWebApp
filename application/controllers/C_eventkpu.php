<?php
/**
*
*/
class C_eventkpu extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_eventkpu');
	}
	public function index()
	{
		$data = array(
			'nama' => 'debat',
			'data_event' => $this->M_eventkpu->get_data()
		);
		$this->load->view('eventkpu',$data);
	}
	public function edit()
	{
			$data = $this->input->post(null,TRUE);
			$edit = $this->M_eventkpu->edit_data($data);
			if($edit){
				  echo "<script>alert('berhasil Edit Data');</script>";
					redirect('C_eventkpu/index');
			}else{
				  echo "<script>alert('Gagal Edit Data');</script>";
			}
	}
	public function add()
	{
			$data = $this->input->post(null,TRUE);
			$add = $this->M_eventkpu->add_data($data);
			if($add){
				echo "<script>alert('berhasil Menambahkan Data');</script>";
					redirect('C_eventkpu/index');
			}else{
				  echo "<script>alert('Gagal Menambahkan Data');</script>";
			}
	}
	public function delete()
	{
			$id = $this->input->post('id');
			$hapus = $this->M_eventkpu->delete_data($id);
			if($hapus){
				echo "<script>alert('berhasil Menambahkan Data');</script>";
					redirect('C_eventkpu/index');
			}else{
			 	echo "<script>alert('Gagal Delete Data');</script>";
			}
	}
}
