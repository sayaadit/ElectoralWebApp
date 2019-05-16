<?php
/**
*
*/
class C_cekpemilih extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_cekpemilih');
	}

	public function index()
	{
		// $this->session->set_flashdata('cari_pemilih','');
		$data = array(
			'title' => 'Data Pemilih',
			'pemilih' => $this->M_cekpemilih->get_data()
		);
		$this->load->view('cekpemilih',$data);
	}

	public function cari()
	{
		$data = $this->input->post(null,TRUE);
		$cari = $this->M_cekpemilih->cari_data($data);
		if($cari){
			$data = array(
				'title' => 'Hasil Pencarian',
				'hasil' => $this->M_cekpemilih->cari_data($data)
			);
			$this->session->set_userdata($data);
			$this->session->set_flashdata('cari_pemilih','found');
			redirect('C_cekpemilih/index');
		}else{
			$this->session->set_flashdata('cari_pemilih','not found');
			redirect('C_cekpemilih/index');
		}
	}

	public function add()
	{
		$data = $this->input->post(null,TRUE);
		$insert = $this->M_cekpemilih->save_data($data);
		if($insert){
			$this->session->set_flashdata('alert','sukses insert');
			redirect('C_cekpemilih/index');
		}else{
			echo "<script>alert('Gagal Menambahkan Data')</script>";
		}
	}

	public function edit()
	{
		$data = $this->input->post(null,TRUE);
		$edit = $this->M_cekpemilih->edit_data($data);
		if($edit){
			$this->session->set_flashdata('alert','sukses edit');
			redirect('C_cekpemilih/index');
		}else{
			echo "<script>alert('Gagal Menambahkan Data')</script>";
		}
	}

	public function hapus()
	{
		$no_ktp = $this->input->post('no_ktp');
		$hapus = $this->M_cekpemilih->delete_data($no_ktp);
		if($hapus){
			$this->session->set_flashdata('alert','sukses hapus');
			redirect('C_cekpemilih/index');
		}else{
			echo "<script>alert('Gagal Menambahkan Data')</script>";
		}
	}
}

?>
