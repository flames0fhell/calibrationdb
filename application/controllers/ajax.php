<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('username') == ""){
			redirect('login');
		}
	}

	public function getsection(){
		$plant_id = $this->input->post('plant_id');
		$section_id = $this->input->post('section_id');
		$section_data = $this->Atikamodel->getDataSection($plant_id)->result_array();

		echo "<option value=''>-- Select Section --</option>";
		foreach($section_data as $key => $value){
			if($section_id != "" AND $section_id ==$value['id_section']){
				echo "<option selected='selected' value='".$value['id_section']."'>".$value['section_name']."</option>";

			}else{
				echo "<option value='".$value['id_section']."'>".$value['section_name']."</option>";
			}
		}
	}
	public function device_new(){
		$data = array();
		$data['plants'] = $this->Atikamodel->getDataPlant()->result_array();
		$data['sections'] = $this->Atikamodel->getDataSection()->result_array();
		$this->load->view('ajax/alat_baru',$data);
	}
	public function device_edit(){
		$data = array();
		$data['device_id'] = $params['device_id']  = $this->input->post('device_id');
		$data['data_alat'] = $this->Atikamodel->getDataDevices($params)->result_array();
		$data['plants'] = $this->Atikamodel->getDataPlant()->result_array();
		$data['sections'] = $this->Atikamodel->getDataSection()->result_array();
		$this->load->view('ajax/alat_edit',$data);
	}
	public function upload_sertif(){
		$data = array();
		$data['section'] = $this->input->post('section');
		$data['group'] = $this->input->post('group');
		if($data['group'] != 'undefined'){
			$this->load->view('ajax/upload_sertificate',$data);
		}else{
			$this->load->view('ajax/error',$data);
		}
	}
	public function pinjam(){
		$data = array();
		$data['rent'] = $this->input->post('rent');
		foreach($data['rent'] as $k => $device_id){
			$data['buff'][] = $this->Atikamodel->getDataDevices(array('device_id' => $device_id))->result_array();
		}
		$data['plants'] = $this->Atikamodel->getDataPlant()->result_array();
		$data['sections'] = $this->Atikamodel->getDataSection()->result_array();
		$this->load->view('ajax/pinjam',$data);
	}

	public function kembali(){
		$data = array();
		$data['rent'] = $this->input->post('rent');
		foreach($data['rent'] as $k => $device_id){
			$data['buff'][] = $this->Atikamodel->getDataDevices(array('device_id' => $device_id))->result_array();
		}
		$data['plants'] = $this->Atikamodel->getDataPlant()->result_array();
		$data['sections'] = $this->Atikamodel->getDataSection()->result_array();
		$this->load->view('ajax/kembali',$data);
	}
}