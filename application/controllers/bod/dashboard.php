<?php
class dashboard extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('models_bod/model_bod');
		
		if($this->session->userdata('status_login') != "4V050oXlAMwyba8kkr5Q"){
			redirect(base_url("index.php/login"));
		}
		else if ($this->session->userdata('level') != "3")
		{
			redirect(base_url("index.php/error404"));
		} 
	}
	
	function index(){

		$dataVendor['vendor'] = $this->model_bod->getDataVendor();
		
		$this->load->view('view_bod/header');
		$this->load->view('view_bod/dashboard', $dataVendor);
		$this->load->view('view_bod/footer');

	}

	function toDataVendor($id){

		$dataVendor['vendor'] = $this->model_bod->getDetailVendor($id);

		$this->load->view('view_bod/header');
		$this->load->view('view_bod/data_vendor', $dataVendor);
		$this->load->view('view_bod/footer');
	}

}


?>
