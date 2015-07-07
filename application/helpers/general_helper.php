<?php 
function str_plant($id_plant){
	// Get a reference to the controller object
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('Atikamodel');

    // Call a function of the model
	$data = $CI->Atikamodel->getDataPlant(array("id_plant" => $id_plant))->result_array();

	return $data[0]['plant_name'];
}

function str_section($id_section){
	// Get a reference to the controller object
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('Atikamodel');

    // Call a function of the model
	$data = $CI->Atikamodel->getDataSection("",$id_section)->result_array();

	return $data[0]['section_name'];
}