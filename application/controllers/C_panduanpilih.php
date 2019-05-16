<?php
/**
*
*/
class C_panduanpilih extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_panduanpilih');
	}
	public function index()
	{
		$data = array(
			'title' => 'apalah',
			'isian' => $this->m_panduanpilih->get_data()
		);
		$this->load->view('panduanpilih',$data);
	}

	public function edit()
	{
			$nmfile = $this->input->post('urutan');
			$config['upload_path'] =  './asset/img/';
			$config['allowed_types'] = 'gif';
			$config['max_size'] = '10000';
			$config['file_name'] = $nmfile;

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$gambar = $this->upload->do_upload('gambar');
			$data= array(
				'urutan' => $this->input->post('urutan'),
				'isi' => $this->input->post('isi'),
				'gambar' => $this->upload->data('file_name'),
			);
			$edit = $this->m_panduanpilih->edit_data($data);
			if($gambar && $edit){
				  echo "<script>alert('berhasil Edit Data');</script>";
					redirect('c_panduanpilih/index');
			}else{
				  echo "<script>alert('Gagal Edit Data');</script>";
			}
	}
	public function add()
	{
        $nmfile = $this->input->post('urutan');
        $config['upload_path'] =  './asset/img/';
        $config['allowed_types'] = 'gif';
				$config['max_size'] = '10000';
        $config['file_name'] = $nmfile;

				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				$gambar = $this->upload->do_upload('gambar');
				$data= array(
					'urutan' => $this->input->post('urutan'),
					'isi' => $this->input->post('isi'),
					'gambar' => $this->upload->data('file_name'),
				);
				$add = $this->m_panduanpilih->add_data($data);
			if($gambar && $add){
				echo "<script>alert('berhasil Menambahkan Data');</script>";
					redirect('c_panduanpilih/index');
			}else{
				  echo "<script>alert('Gagal Menambahkan Data');</script>";
					redirect('c_panduanpilih/index');
			}
	}
	public function delete()
	{
			$urutan = $this->input->post('urutan');
			$hapus = $this->m_panduanpilih->delete_data($urutan);
			if($hapus){
				unlink("./asset/img/".$this->input->post('gambar'));
				echo "<script>alert('berhasil Menambahkan Data');</script>";
					redirect('c_panduanpilih/index');
			}else{
			 	echo "<script>alert('Gagal Delete Data');</script>";
			}
	}
}
