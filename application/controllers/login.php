<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();

		
	}
	public function index()
	{
		if($this->session->userdata('username') != ""){
			redirect('home');
		}
		$data = array();
		$data['dview']['plants'] = $this->Atikamodel->getDataPlant()->result_array();
		//print_r($data);die;
		$data['contents'] = $this->load->view('block/login',$data,true);

		//print_r($data);die;
		$this->load->view('main_template',$data);
	}
	public function do_login(){
		if(isset($_POST)){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$plant 	  = $this->input->post('plant');

			$login_data = array(
					"username" => $username
					,"password" => $password
					,"plant" => $plant
				);
			$login_cek = $this->Atikamodel->login_cek($login_data);
			if(isset($login_cek['username'])){
				$this->session->set_userdata('username',$username);
				$this->session->set_userdata('nama',$login_cek['nama']);
				$this->session->set_userdata('plant_id',$plant);
				$this->session->set_userdata('picture',$login_cek['picture']);
				echo "<script>window.location.href=\"".site_url('home')."\";</script>";
			}else{
				echo '<div class="alert alert-warning">Ops... Something Wrong With Your Data</div>';
			}
		}else{
			echo "<div class='alert alert-danger'>Internal Post Error</div>";
		}
	}

	public function logout(){
		$this->session->sess_destroy();
        redirect('home');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */