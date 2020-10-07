<?php

class registration extends CI_Controller
{

	function index(){
                $this->output->set_content_type("Access-Control-Allow-Origin: *")->set_content_type("Access-Control-Allow-Methods: POST, GET")->set_content_type("Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept");
                $this->load->view('view_vendor/header');
                $this->load->view('view_vendor/registration');
                $this->load->view('view_vendor/footer');
        }
        
        function get_classification()
	{
		$this->load->model('models_vendor/registration_model');
		$data=$this->registration_model->get_classification();
		echo json_encode($data);
        }
        
        function get_business_field()
	{
		$this->load->model('models_vendor/registration_model');
		$data=$this->registration_model->get_business_field();
		echo json_encode($data);
        }
        
        function get_category_business_field($id)
	{
		$this->load->model('models_vendor/registration_model');
		$data=$this->registration_model->get_category_business_field($id);
		echo json_encode($data);
	}

}


?>