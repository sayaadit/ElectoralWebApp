<?php
/**
*
*/
class C_adminHome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('');
	}

	public function index()
	{

        if ($this->session->userdata('level')!="admin") {
            redirect('C_loginAdmin/index');
        }else{
        	echo "BERHASIL";
        }
		$this->load->view('admin/home');
	}

}
?>
