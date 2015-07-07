<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Atikamodel extends CI_Model{
	function __construct(){
		parent::__construct();

	}

	public function generalInsert($table,$data){
        return $this->db->insert($table,$data);
	}
	public function generalUpdate($table,$whereclause,$data){
        foreach ($whereclause as $key => $value) {
            $this->db->where($key,$value);
        }
        return $this->db->update($table,$data);
    }
    public function login_cek($params){
    	$username = $params['username'];
    	$password = md5($params['password']);
    	$plant 	  = $params['plant'];

    	$this->db->from('users');
    	$this->db->where('username',$username);
    	$this->db->where('password',$password);
    	$this->db->where('id_plant',$plant);
    	$this->db->where('status',1);
    	$data = $this->db->get()->result_array();
    	if(count($data)>0){
    		$data_user['username'] = $data[0]['username'];
    		$data_user['nama'] = $data[0]['nama_lengkap'];
            $data_user['picture'] = $data[0]['picture'];
    	}else{
    		$data_user = array();
    	}
   		return $data_user;
    }
    public function getDataPlant($params = array()){

    	$this->db->from('plants');
        if(isset($params['id_plant'])){
            $this->db->where('id_plant',$params['id_plant']);
        }
    	return $this->db->get();
    }
    public function getDataSection($plant_id = "",$section_id=""){
        $this->db->from('sections');
        if(!empty($plant_id)){
            $this->db->where('id_plant',$plant_id);
        }
        if(!empty($section_id)){
            $this->db->where('id_section',$section_id);
        }
        return $this->db->get();
    }
    public function getSertificate($params = array()){
        $plant_id = isset($params['plant'])?$params['plant']:'';
        $section_id = isset($params['section'])?$params['section']:'';
        $group_id = isset($params['group'])?$params['group']:'';

        $this->db->from('sertificate');
        if(!empty($plant_id)){
            $this->db->where('plant',$plant_id);
        }
        if(!empty($section_id)){
            $this->db->where('section',$section_id);
        }
        if(!empty($group_id)){
            $this->db->where('group',$group_id);
        }

        return $this->db->get();
    }
    public function getDataRent($params = array()){
        $device_id = isset($params['device_id'])?$params['device_id']:'';
        $status = isset($params['status'])?$params['status']:'';

        $this->db->from('rent_devices');
        if($device_id != ""){
            $this->db->where('device_id',$device_id);
        }
        if($status != ""){
            $this->db->where('status',$status);
        }
        return $this->db->get();
    }
    public function getDataDevices($params = array()){
        $device_id = isset($params['device_id'])?$params['device_id']:'';
        $plant_id = isset($params['plant_id'])?$params['plant_id']:'';
        $section = isset($params['section'])?$params['section']:'';
        $group = isset($params['group'])?$params['group']:'';
        $sort = isset($params['sort'])?$params['sort']:'';
        $direction = isset($params['direction'])?$params['direction']:'desc';

        $this->db->from('devices');
    
        if(!empty($device_id)){
            $this->db->where('id_device',$device_id);
        }
        if(!empty($plant_id)){
            $this->db->where('plant',$plant_id);
        }
        if(!empty($section)){
            $this->db->where('section',$section);
        }
        if(!empty($group)){
            $this->db->where('group',$group);
        }
        if(isset($params['status'])){
            if(is_array($params['status'])){
                $this->db->where_in('status',$params['status']);
            }else{
                $this->db->where('status',$params['status']);
            }
        }
        if(!empty($sort)){
            $this->db->order_by($sort,$direction);
        }

        return $this->db->get();

    }
}

?>