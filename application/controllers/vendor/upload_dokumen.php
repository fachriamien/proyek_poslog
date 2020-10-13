<?php
class upload_dokumen extends CI_Controller
{
    function __construct(){
		parent::__construct();
		if($this->session->userdata('status_login') != "4V050oXlAMwyba8kkr5Q"){
			redirect(base_url("index.php/login"));
		}
		else if ($this->session->userdata('level') != "1")
		{
			redirect(base_url("index.php/error404"));
		}
    }
    
    function index(){
		$this->load->model('models_vendor/dokumen_model');
		$vendor_id = $this->dokumen_model->get_vendor()->row();

		if($this->dokumen_model->get_validate_registed_or_not($vendor_id) == 0){
			$data['hasil'] = $this->dokumen_model->get_vendor()->row();
			
			$data['type'] = $this->dokumen_model->get_dokumen_type();
			$data['group'] = $this->dokumen_model->get_dokumen_group();

			$this->load->view('view_vendor/header');
			$this->load->view('view_vendor/upload_dokumen', $data);
			$this->load->view('view_vendor/footer');
		} else{
			echo "<script> alert('Vendor sudah mengisi dokumen. Silahkan lanjut untuk submit data asset.'); window.location.href='".base_url()."index.php/vendor/display_asset'; </script>";
		}
    }
    
    function unggah_dokumen(){
		$this->load->model('models_vendor/dokumen_model');

		if($this->input->post('submit'))
		{
			//meload file model komentar
			$this->load->model('models_vendor/dokumen_model');
			//menjalankan fungsi tambah pada model
			$this->dokumen_model->save_dokumen();

			//mengarahkan file ke controller komentar 
			//artinya mengarah ke komentar/index
			redirect ('vendor/dashboard');
		}

		// $data['hasil'] = $this->dokumen_model->cek_perbaikan($vendor_id);
		// $data['vendor_id'] = $vendor_id;

		// $this->load->view('view_vendor/header');
		// $this->load->view('view_vendor/upload_perbaikan', $data);
		// $this->load->view('view_vendor/footer');
	}
}
?>