<?php
/**
*
*/
class C_loginAdmin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}
	public function index()
	{
		$this->load->view('admin/login_admin');
	}

	public function verify_login()
	{
				$data = $this->input->post(null,TRUE);
        $login= $this->M_login->login($data);
        if($login){
            $sess_data = array(
                'logged_in' => "Sudah Login",
                'username' => $login->username,
                'level' => "admin"
            );
            $this->session->set_userdata($sess_data);
            redirect('C_timeline/index');
        }else{
            $this->session->set_flashdata('alert', 'gagal_login');
            redirect('C_loginAdmin/index');
        }
	}
	public function logout(){
        //isi dengan sess_destroy
        $this->session->sess_destroy();
        redirect(site_url('C_home'));
  }
}
?>
