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

		$data['vendor'] = $this->model_bod->getDetailVendor($id);
		$data['pic'] = $this->model_bod->getVendorPIC($id);

		$this->load->view('view_bod/header');
		$this->load->view('view_bod/data_vendor', $data);
		$this->load->view('view_bod/footer');
	}

	function toBerkasVendor($id){
		$data['hasil'] = $this->model_bod->get_vendor($id);
        $data['type'] = $this->model_bod->get_dokumen_type();
		$data['group'] = $this->model_bod->get_dokumen_group();
		$data['dokumen'] = $this->model_bod->getDokumen($id);

		$this->load->view('view_bod/header');
		$this->load->view('view_bod/berkas_vendor', $data);
		$this->load->view('view_bod/footer');
	}

	function viewPDF($pdf_file){
		$this->load->helper('download');
		// $path = file_get_contents(base_url()."C:/xampp/htdocs/proyek_poslog/assets/upload/".$pdf_file); // get file name
		// $name = "$pdf_file"; // new name for your file
		// force_download($name, $path);

		// if ($fileName) {
			$file = realpath ( "C:\xampp\htdocs\proyek_poslog\assets\upload" ) . "\\" . $pdf_file;
			// check file exists    
			if (file_exists ( $file )) {
			 // get file content
			 $data = file_get_contents ( $file );
			 //force download
			 force_download ( $fileName, $data );
			} else {
			 // Redirect to base url
			//  redirect ( base_url () );
			}
		//    }
	}

	function verifikasiVendor($id){
		$data['hasil'] = $this->model_bod->get_vendor($id);

		$updateData = array('vendor_remark' => "TERVERIFIKASI", 'vendor_status' => '4');
		$data['vendor'] = $this->model_bod->verifikasiVendor($id, $updateData);
		redirect(base_url('index.php/bod/dashboard'));
	}

	


}


?>
