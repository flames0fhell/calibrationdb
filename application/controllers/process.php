<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('username') == ""){
			redirect('login');
		}
	}

	public function device_new(){
		$data['part_name'] = $this->input->post('part_name');
		$data['serial_number'] = $this->input->post('serial_number');
		$data['drawing_maker'] = $this->input->post('drawing_maker');
		$data['diameter'] = $this->input->post('diameter');
		$data['diameter_upper'] = $this->input->post('d_upper');
		$data['diameter_lower'] = $this->input->post('d_lower');
		$data['depth'] = $this->input->post('depth');
		$data['depth_upper'] = $this->input->post('depth_upper');
		$data['depth_lower'] = $this->input->post('depth_lower');
		$data['drawing_ahm'] = $this->input->post('drawing_ahm');
		$data['material_number'] = $this->input->post('material_number');
		$data['quantity'] = $this->input->post('qty');
		$data['plant'] = $this->input->post('plant');
		$data['section'] = $this->input->post('section');
		$data['group'] = $this->input->post('group');
		$data['create_date'] = date("Y-m-d H:i:s");
		if($data['part_name'] == ""){
			echo "<div class='alert alert-danger'>Mohon Part Name Di Isi</div>";
		}elseif($data['plant'] == ""){
			echo "<div class='alert alert-danger'>Mohon Plant Di Isi</div>";

		}elseif($data['section'] == ""){
			echo "<div class='alert alert-danger'>Mohon Section Di Isi</div>";

		}elseif($data['group'] == ""){
			echo "<div class='alert alert-danger'>Mohon Pilih Group</div>";

		}else{
			$insert = $this->Atikamodel->generalInsert('devices',$data);
			if($insert){
				echo "<div class='alert alert-success'>Success Entry SN : ".$data['serial_number']."</div>";
			}else{
				echo "<div class='alert alert-danger'>Kesalahan Database Server</div>";
			}
		}
	}
	public function device_edit(){
		$param_w['id_device'] = $this->input->post('device_id');
		$data['part_name'] = $this->input->post('part_name');
		$data['serial_number'] = $this->input->post('serial_number');
		$data['drawing_maker'] = $this->input->post('drawing_maker');
		$data['diameter'] = $this->input->post('diameter');
		$data['diameter_upper'] = $this->input->post('d_upper');
		$data['diameter_lower'] = $this->input->post('d_lower');
		$data['depth'] = $this->input->post('depth');
		$data['depth_upper'] = $this->input->post('depth_upper');
		$data['depth_lower'] = $this->input->post('depth_lower');
		$data['drawing_ahm'] = $this->input->post('drawing_ahm');
		$data['material_number'] = $this->input->post('material_number');
		$data['quantity'] = $this->input->post('qty');
		$data['plant'] = $this->input->post('plant');
		$data['section'] = $this->input->post('section');
		$data['group'] = $this->input->post('group');
		if($data['part_name'] == ""){
			echo "<div class='alert alert-danger'>Mohon Part Name Di Isi</div>";
		}elseif($data['plant'] == ""){
			echo "<div class='alert alert-danger'>Mohon Plant Di Isi</div>";

		}elseif($data['section'] == ""){
			echo "<div class='alert alert-danger'>Mohon Section Di Isi</div>";

		}elseif($data['group'] == ""){
			echo "<div class='alert alert-danger'>Mohon Pilih Group</div>";

		}else{
			$update = $this->Atikamodel->generalUpdate('devices',$param_w,$data);
			if($update){
				echo "<div class='alert alert-success'>Success</div>";
			}else{
				echo "<div class='alert alert-danger'>Kesalahan Database Server</div>";
			}
		}
	}

	public function ganti_status(){
		$device_id = $this->input->post('device_id');
		$status = $this->input->post('status');

		$update = $this->Atikamodel->generalUpdate('devices',array("id_device" => $device_id),array("status" => $status));
		if($update){
			echo 1;
		}else{
			echo 0;
		}
	}
	public function slugify($text)
	{ 
	  // replace non letter or digits by -
	  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

	  // trim
	  $text = trim($text, '-');

	  // transliterate
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	  // lowercase
	  $text = strtolower($text);

	  // remove unwanted characters
	  $text = preg_replace('~[^-\w]+~', '', $text);

	  if (empty($text))
	  {
	    return 'n-a';
	  }

	  return $text;
	}
	public function file_save($data){
		$lokasi_file    = $data['tmp_name'];
        $nama_file      = $data['name'];
        $ukuran_file    = $data['size'];
        $tipe_file      = $data['type'];
        $nama_file		= $this->slugify($nama_file);
        $ext 			= pathinfo($data['name'], PATHINFO_EXTENSION);
        $nama_file 		= str_replace($ext, "", $nama_file);
        $nama_file  = date("Y-m-d--His") . "_".$nama_file.".".$ext;
        $direktori  = "storage/sertificates/".$nama_file;
        @move_uploaded_file($lokasi_file,"$direktori");
        return $direktori;
	}
	public function upload_sertif(){
		$data['params']['plant'] = $this->session->userdata('plant_id');
		$data['params']['section'] = $this->input->post('section');
		$data['params']['group'] = $this->input->post('group');
		$data['params']['create_date'] = date("Y-m-d H:i:s");
		if($_FILES['sertificate']['tmp_name'] != "" || !empty($data['params']['section'])){
			//cek apakah sertifikat sudah ada ?
			$cek = $this->Atikamodel->getSertificate($data['params'])->num_rows();
			$data['params']['path'] = $this->file_save($_FILES['sertificate']);
			if($cek < 1 ){
				$insert = $this->Atikamodel->generalInsert('sertificate',$data['params']);
				if($insert){
					echo "<div class='alert alert-success'>Sertifikat Baru Telah Di Upload</div>";
				}else{
					echo "<div class='alert alert-danger'>Sertifikat Gagal Di Simpan</div>";
				}
			}else{
				$w_update['path'] = $data['params']['path'];
				unset($data['params']['path']);
				unset($data['params']['create_date']);
				
				$update = $this->Atikamodel->generalUpdate('sertificate',$data['params'],$w_update);
				if($update){
					echo "<div class='alert alert-success'>Sertifikat Telah Diperbaharui</div>";
				}else{
					echo "<div class='alert alert-danger'>Sertifikat Gagal Di Simpan</div>";
				}
			}
		}else{
			echo "<div class='alert alert-danger'>Kesalahan User | Cek kelengkapan data</div>";
		}	
	}
	public function pinjam(){
		$device = $this->input->post('device');
		$params['name'] = $this->input->post('peminjam');
		$params['plant'] = $this->input->post('plant');
		$params['section'] = $this->input->post('section');
		$params['rent_date'] = $this->input->post('tgl_pinjam');
		$params['givenback_date'] = $this->input->post('tgl_kembali');
		$params['status'] = 1;
		$params['unique_code'] = md5(rand(00000000,99999999).$params['name'].$params['rent_date']);
		$no = 1;
		$hasil = 0;
		foreach($device as $k => $device_id){
			//cek apakah barang sudah dipinjam atau belum
			$cek = $this->Atikamodel->getDataRent(array("device_id" => $device_id,"status" => 1))->num_rows();
			if($cek < 1){
				$params['device_id'] = $device_id;
				$simpan = $this->Atikamodel->generalInsert('rent_devices',$params);
				if($simpan){
					$hasil = 1;
					echo "<div class='alert alert-success'>Sukses meminjamkan item ke $no </div>";
				}else{
					echo "<div class='alert alert-danger'>Gagal meminjamkan item ke $no </div>";
				}
			}else{
				echo "<div class='alert alert-warning'>Item ke $no sedang dipinjam</div>";
			}
			$no++;
		}
		if($hasil == 1){
			echo "<div class='alert alert-success'>Kode Unik : <strong>".$params['unique_code']."</strong><br>
			 	Disimpan untuk pengembalian
			</div>";
		}
	}
	public function kembali(){
		$device = $this->input->post('device');
		$code = $this->input->post('code');
		$no = 1;
		foreach($device as $k => $device_id){
			$params['device_id'] = $device_id;
			$params['unique_code'] = $code;
			$rgbdate = date("Y-m-d H:i:s");
			$simpan = $this->Atikamodel->generalUpdate('rent_devices',$params,array("status"=>2,"realgb_date"=>$rgbdate));
			if($simpan){
				echo "<div class='alert alert-success'>Sukses mengembalikan item ke $no </div>";
			}else{
				echo "<div class='alert alert-danger'>Gagal mengembalikan item ke $no </div>";
			}
			
			$no++;
		}
	}
}