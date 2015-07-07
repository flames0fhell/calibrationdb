<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('username') == ""){
			redirect('login');
		}
	}
	public function index()
	{
		$plant_id = $this->input->get('plant');
		$section_id = $this->input->get('section');
		$data = array();
		//START SHOW DEVICE
		$data['params'] = array(
					"plant_id" => $plant_id
					,"section" => $section_id
			);
		$data['devices']['data'] = $this->Atikamodel->getDataDevices($data['params'])->result_array();
		$data['plants']['data'] = $this->Atikamodel->getDataPlant()->result_array();
		$data['sections']['data'] = $this->Atikamodel->getDataSection()->result_array();

		$data['d']['nama'] = $this->session->userdata('nama');
		$pp_url = base_url()."/"."picture"."/".$this->session->userdata('picture');
		$data['d']['pp'] = "<img src='".$pp_url."' class=\"img-circle\" style=\"max-height:30px;float:left;position:relative;top:-5px;left:-5px\" />";


		$data['navbar'] = $this->load->view('block/navbar',$data,true);
		$data['contents'] = $this->load->view('devices',$data,true);
		$this->load->view('main_template',$data);
	}
	public function kalibrasi(){
		$data = array();
		$user_plant_id = $this->session->userdata('plant');
		$group_id = $this->input->get('group');
		$section_id = $this->input->get('section_kalibrasi');
		$data['params'] = array(
					"group" => $group_id
					,"section" => $section_id
			);
		if(empty($group_id) || empty($section_id)){
			$data['devices']['data'] = array();
			$data['download']['path'] = array();
		}else{
			$data['devices']['data'] = $this->Atikamodel->getDataDevices($data['params'])->result_array();
			$for_sertif = array(
					"plant" => $user_plant_id
					,"section" => $section_id
					,"group" => $group_id
				);
			$data['download']['path'] = $this->Atikamodel->getSertificate($for_sertif)->result_array();
		}
		$data['sections']['data'] = $this->Atikamodel->getDataSection($user_plant_id)->result_array();

		$data['d']['nama'] = $this->session->userdata('nama');
		$pp_url = base_url()."/"."picture"."/".$this->session->userdata('picture');
		$data['d']['pp'] = "<img src='".$pp_url."' class=\"img-circle\" style=\"max-height:30px;float:left;position:relative;top:-5px;left:-5px\" />";

		$data['navbar'] = $this->load->view('block/navbar',$data,true);
		$data['contents'] = $this->load->view('kalibrasi',$data,true);
		$this->load->view('main_template',$data);
	}
	public function peminjaman(){
		$plant_id = $this->input->get('plant');
		$section_id = $this->input->get('section');
		$data = array();
		//START SHOW DEVICE
		$data['params'] = array(
					"plant_id" => $plant_id
					,"section" => $section_id
			);
		$data['devices']['data'] = $this->Atikamodel->getDataDevices($data['params'])->result_array();
		$data['plants']['data'] = $this->Atikamodel->getDataPlant()->result_array();
		$data['sections']['data'] = $this->Atikamodel->getDataSection()->result_array();

		$data['rented_devices']['data'] = $this->Atikamodel->getDataRent(array("status"=>1))->result_array();
		foreach($data['rented_devices']['data'] as $key => $val){
			$data['rented_devices']['id'][] = $val['device_id'];
			$data['rented_devices']['device'][$val['device_id']] = $val;
		}
		$data['d']['nama'] = $this->session->userdata('nama');
		$pp_url = base_url()."/"."picture"."/".$this->session->userdata('picture');
		$data['d']['pp'] = "<img src='".$pp_url."' class=\"img-circle\" style=\"max-height:30px;float:left;position:relative;top:-5px;left:-5px\" />";


		$data['navbar'] = $this->load->view('block/navbar',$data,true);
		$data['contents'] = $this->load->view('peminjaman',$data,true);
		$this->load->view('main_template',$data);
	}
	public function perbaikan(){
		$data['params'] = array(
				"status" => 2
			);
		$data['devices']['data'] = $this->Atikamodel->getDataDevices($data['params'])->result_array();

		$data['d']['nama'] = $this->session->userdata('nama');
		$pp_url = base_url()."/"."picture"."/".$this->session->userdata('picture');
		$data['d']['pp'] = "<img src='".$pp_url."' class=\"img-circle\" style=\"max-height:30px;float:left;position:relative;top:-5px;left:-5px\" />";

		$data['title'] = "Perbaikan Alat";
		$data['navbar'] = $this->load->view('block/navbar',$data,true);
		$data['contents'] = $this->load->view('perbaikan',$data,true);
		$this->load->view('main_template',$data);
	}
	public function penggantian(){
		$data['params'] = array(
				"status" => array(2,3,4)
			);
		$data['devices']['data'] = $this->Atikamodel->getDataDevices($data['params'])->result_array();

		$data['d']['nama'] = $this->session->userdata('nama');
		$pp_url = base_url()."/"."picture"."/".$this->session->userdata('picture');
		$data['d']['pp'] = "<img src='".$pp_url."' class=\"img-circle\" style=\"max-height:30px;float:left;position:relative;top:-5px;left:-5px\" />";

		$data['title'] = "Penggantian Alat";
		$data['navbar'] = $this->load->view('block/navbar',$data,true);
		$data['contents'] = $this->load->view('perbaikan',$data,true);
		$this->load->view('main_template',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */