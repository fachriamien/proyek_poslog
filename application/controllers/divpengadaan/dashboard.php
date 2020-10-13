<?php
class dashboard extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('model_pengadaan/model_pengadaan');
		
		if($this->session->userdata('status_login') != "4V050oXlAMwyba8kkr5Q"){
			redirect(base_url("index.php/login"));
		}
		else if ($this->session->userdata('level') != "2")
		{
			redirect(base_url("index.php/error404"));
		} 
	}
	
	function index(){

		$dataVendor['vendor'] = $this->model_pengadaan->getDataVendor();
		
		$this->load->view('view_divpengadaan/header');
		$this->load->view('view_divpengadaan/dashboard', $dataVendor);
		$this->load->view('view_divpengadaan/footer');

	}

	function toDataVendor($id){

		$data['vendor'] = $this->model_pengadaan->getDetailVendor($id);
		$data['pic'] = $this->model_pengadaan->getVendorPIC($id);

		$this->load->view('view_divpengadaan/header');
		$this->load->view('view_divpengadaan/data_vendor', $data);
		$this->load->view('view_divpengadaan/footer');
	}

	function toBerkasVendor($id){
		$data['hasil'] = $this->model_pengadaan->get_vendor($id);
        $data['type'] = $this->model_pengadaan->get_dokumen_type();
		$data['group'] = $this->model_pengadaan->get_dokumen_group();
		$data['dokumen'] = $this->model_pengadaan->getDokumen($id);

		$this->load->view('view_divpengadaan/header');
		$this->load->view('view_divpengadaan/berkas_vendor', $data);
		$this->load->view('view_divpengadaan/footer');
	}

	function viewPDF($pdf_file){
		$this->load->helper('download');
		$path = file_get_contents(base_url()."C:/xampp/htdocs/proyek_poslog/assets/upload/".$filename); // get file name
		$name = "sample_file.pdf"; // new name for your file
		force_download($name,$path);
	}

	function verifikasiVendor($id){
		$data['hasil'] = $this->model_pengadaan->get_vendor($id);

		$updateData = array('vendor_remark' => "BELUM TERVERIFIKASI", 'vendor_status' => '4');
		$data['vendor'] = $this->model_pengadaan->verifikasiVendor($id, $updateData);
		redirect(base_url('index.php/bod/dashboard'));
	}

	


}


?>
