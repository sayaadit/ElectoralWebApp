<?php 
/**
* 
*/
class C_profilcalon extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_profilecalon');
	}
	public function index()
	{
        $data = array(
            'title' => 'apalah',
            'isian' => $this->m_profilecalon->get_data()
        );
        $this->load->view('profilCalon',$data);
	}


    public function edit()
    {
        $data = $this->input->post(null,TRUE);
        $edit = $this->m_profilecalon->edit_data($data);
        if($edit){
            echo "<script>alert('berhasil Edit Data');</script>";
            redirect('c_profilcalon/index');
        }else{
            echo "<script>alert('Gagal Edit Data');</script>";
        }
    }
    public function add()
    {
        $data = $this->input->post(null,TRUE);
        $add = $this->m_profilecalon->add_data($data);
        if($add){
            echo "<script>alert('berhasil Menambahkan Data');</script>";
            redirect('c_profilcalon/index');
        }else{
            echo "<script>alert('Gagal Menambahkan Data');</script>";
        }
    }
    public function delete()
    {
        $urutan = $this->input->post('urutan');
        $hapus = $this->m_profilecalon->delete_data($urutan);
        if($hapus){
            echo "<script>alert('berhasil Menambahkan Data');</script>";
            redirect('c_profilcalon/index');
        }else{
            echo "<script>alert('Gagal Delete Data');</script>";
        }
    }
}
