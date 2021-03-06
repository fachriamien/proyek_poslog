<?php

class display_asset extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('models_vendor/displayasset_model', 'vendor');
        $this->load->library('session');

        if ($this->session->userdata('status_login') != "4V050oXlAMwyba8kkr5Q") {
            redirect(base_url("login"));
        } elseif ($this->session->userdata('level') != "1") {
            redirect(base_url("error404"));
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $this->session->userdata('user_id');

        $data['kendaraan'] = $this->vendor->getAssetKendaraan($user_id);
        $data['general'] = $this->vendor->getGeneralAsset($user_id);
        $data['sertifikasi'] = $this->vendor->getSertifikasi($user_id);
        $data['vendor'] = $this->vendor->getVendor();

        $this->load->view('view_vendor/header');
        $this->load->view('view_vendor/display_asset', $data);
        $this->load->view('view_vendor/footer');
    }

    public function add_kendaraan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $this->session->userdata('user_id');

        $data['kendaraan'] = $this->vendor->getAssetKendaraan($user_id);
        $data['vendor'] = $this->vendor->getVendor();

        // $data['test'] = $this->db->get('vendor')->result_array();

        $this->form_validation->set_rules('kendaraan_jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('kendaraan_merk', 'Merk', 'required');
        $this->form_validation->set_rules('kendaraan_qty', 'Qty', 'required');
        $this->form_validation->set_rules('kendaraan_tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('kendaraan_type', 'Type', 'required');
        $this->form_validation->set_rules('kendaraan_payload', 'Payload', 'required');
        $this->form_validation->set_rules('kendaraan_status', 'Status', 'required');
        $this->form_validation->set_rules('kendaraan_services_terakhir', 'Services Terakhir', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('view_vendor/header');
            $this->load->view('view_vendor/display_asset', $data);
            $this->load->view('view_vendor/footer');
        } else {
            $data = [
                'vendor_id' => $this->input->post('vendor_id'),
                'user_id' => $this->input->post('user_id'),
                'kendaraan_jenis' => $this->input->post('kendaraan_jenis'),
                'kendaraan_merk' => $this->input->post('kendaraan_merk'),
                'kendaraan_qty' => $this->input->post('kendaraan_qty'),
                'kendaraan_tahun' => $this->input->post('kendaraan_tahun'),
                'kendaraan_type' => $this->input->post('kendaraan_type'),
                'kendaraan_payload' => $this->input->post('kendaraan_payload'),
                'kendaraan_status' => $this->input->post('kendaraan_status'),
                'kendaraan_services_terakhir' => $this->input->post('kendaraan_services_terakhir')
            ];     
            // var_dump($data); die;

            $this->db->insert('asset_kendaraan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Asset berhasil ditambahkan!</div>');
            redirect('/vendor/display_asset');
        }
    }

    public function edit_kendaraan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kendaraan'] = $this->vendor->getAssetKendaraan($user_id);
        $data['vendor'] = $this->vendor->getVendor();

        // $data['test'] = $this->db->get('vendor')->result_array();

        $this->form_validation->set_rules('kendaraan_jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('kendaraan_merk', 'Merk', 'required');
        $this->form_validation->set_rules('kendaraan_qty', 'Qty', 'required');
        $this->form_validation->set_rules('kendaraan_tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('kendaraan_type', 'Type', 'required');
        $this->form_validation->set_rules('kendaraan_payload', 'Payload', 'required');
        $this->form_validation->set_rules('kendaraan_status', 'Status', 'required');
        $this->form_validation->set_rules('kendaraan_services_terakhir', 'Services Terakhir', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('view_vendor/header');
            $this->load->view('view_vendor/display_asset', $data);
            $this->load->view('view_vendor/footer');
        } else {
            $id = $this->input->post('kendaraan_id');
            $data = [
                'vendor_id' => $this->input->post('vendor_id'),
                'kendaraan_jenis' => $this->input->post('kendaraan_jenis'),
                'kendaraan_merk' => $this->input->post('kendaraan_merk'),
                'kendaraan_qty' => $this->input->post('kendaraan_qty'),
                'kendaraan_tahun' => $this->input->post('kendaraan_tahun'),
                'kendaraan_type' => $this->input->post('kendaraan_type'),
                'kendaraan_payload' => $this->input->post('kendaraan_payload'),
                'kendaraan_status' => $this->input->post('kendaraan_status'),
                'kendaraan_services_terakhir' => $this->input->post('kendaraan_services_terakhir')
            ];
            // var_dump($data); die;

            $this->db->where('kendaraan_id', $id);
            $this->db->update('asset_kendaraan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Asset berhasil diubah!</div>');
            redirect('/vendor/display_asset');
        }
    }

    public function delete_kendaraan()
    {
        $id = $this->uri->segment(4);
        $this->db->where('kendaraan_id', $id);
        $this->db->delete('asset_kendaraan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Asset berhasil dihapus!</div>');

        redirect('/vendor/display_asset');
    }
    //end asset kendaraan

    public function add_generalasset()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $this->session->userdata('user_id');

        $data['general'] = $this->vendor->getGeneralAsset($user_id);
        $data['vendor'] = $this->vendor->getVendor();

        $this->form_validation->set_rules('general_jenis_asset', 'Jenis Asset', 'required');
        $this->form_validation->set_rules('general_qty', 'General Qty', 'required');
        $this->form_validation->set_rules('general_status_kepemilikan', 'Status Kepemilikan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('view_vendor/header');
            $this->load->view('view_vendor/display_asset', $data);
            $this->load->view('view_vendor/footer');
        } else {
            $data = [
                'vendor_id' => $this->input->post('vendor_id'),
                'user_id' => $this->input->post('user_id'),
                'general_jenis_asset' => $this->input->post('general_jenis_asset'),
                'general_qty' => $this->input->post('general_qty'),
                'general_status_kepemilikan' => $this->input->post('general_status_kepemilikan'),
            ];
            // var_dump($data); die;

            $this->db->insert('asset_general', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Asset General berhasil ditambahkan!</div>');
            redirect('/vendor/display_asset');
        }
    }

    public function edit_generalasset()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $this->session->userdata('user_id');

        $data['general'] = $this->vendor->getGeneralAsset($user_id);
        $data['vendor'] = $this->vendor->getVendor();

        $this->form_validation->set_rules('general_jenis_asset', 'Jenis Asset', 'required');
        $this->form_validation->set_rules('general_qty', 'General Qty', 'required');
        $this->form_validation->set_rules('general_status_kepemilikan', 'Status Kepemilikan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('view_vendor/header');
            $this->load->view('view_vendor/display_asset', $data);
            $this->load->view('view_vendor/footer');
        } else {
            $id = $this->input->post('general_id');
            $data = [
                'vendor_id' => $this->input->post('vendor_id'),
                'general_jenis_asset' => $this->input->post('general_jenis_asset'),
                'general_qty' => $this->input->post('general_qty'),
                'general_status_kepemilikan' => $this->input->post('general_status_kepemilikan'),
            ];
            // var_dump($data); die;

            $this->db->where('general_id', $id);
            $this->db->update('asset_general', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Asset General berhasil diubah!</div>');
            redirect('/vendor/display_asset');
        }
    }

    public function delete_generalasset()
    {
        $id = $this->uri->segment(4);
        $this->db->where('general_id', $id);
        $this->db->delete('asset_general');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Asset berhasil dihapus!</div>');

        redirect('/vendor/display_asset');
    }
    //end asset general

    public function add_sertifikasi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $this->session->userdata('user_id');

        $data['general'] = $this->vendor->getSertifikasi($user_id);
        $data['vendor'] = $this->vendor->getVendor();

        $this->form_validation->set_rules('sertifikasi_jenis', 'Jenis Sertifikasi', 'required');
        $this->form_validation->set_rules('sertifikasi_tahun', 'Qty', 'required');
        $this->form_validation->set_rules('sertifikasi_nomor', 'Nomor', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('view_vendor/header');
            $this->load->view('view_vendor/display_asset', $data);
            $this->load->view('view_vendor/footer');
        } else {
            // $serverip = gethostbyname(gethostname());
            $upload = $this->vendor->uploadImage();
            $image = $upload['file']['file_name'];
            $data = [
                'vendor_id' => $this->input->post('vendor_id'),
                'user_id' => $this->input->post('user_id'),
                'sertifikasi_jenis' => $this->input->post('sertifikasi_jenis'),
                'sertifikasi_tahun' => $this->input->post('sertifikasi_tahun'),
                'sertifikasi_nomor' => $this->input->post('sertifikasi_nomor'),
                'sertifikasi_file' => $image
            ];
            // var_dump($data); die;

            $this->db->insert('asset_sertifikasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Asset Sertifikasi berhasil ditambahkan!</div>');
            redirect('/vendor/display_asset');
        }
    }

    public function edit_sertifikasi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $this->session->userdata('user_id');

        $data['general'] = $this->vendor->getSertifikasi($user_id);
        $data['vendor'] = $this->vendor->getVendor();

        $this->form_validation->set_rules('sertifikasi_jenis', 'Jenis Sertifikasi', 'required');
        $this->form_validation->set_rules('sertifikasi_tahun', 'Qty', 'required');
        $this->form_validation->set_rules('sertifikasi_nomor', 'Nomor', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('view_vendor/header');
            $this->load->view('view_vendor/display_asset', $data);
            $this->load->view('view_vendor/footer');
        } else {
            $id = $this->input->post('sertifikasi_id');
            $upload = $this->vendor->uploadImage();
            if (empty($upload['file']['file_name'])) {
                      $target_file = $this->vendor->get_image($id);
                      $image = $target_file->sertifikasi_file;
                  } else {
                      $target_file = $this->vendor->get_image($id);
                      $file = './assets/upload/img_displayasset/' . $target_file->sertifikasi_file;
                      unlink($file);
                      $image = $upload['file']['file_name'];
                  }
                $data = [
                'vendor_id' => $this->input->post('vendor_id'),
                'sertifikasi_jenis' => $this->input->post('sertifikasi_jenis'),
                'sertifikasi_tahun' => $this->input->post('sertifikasi_tahun'),
                'sertifikasi_nomor' => $this->input->post('sertifikasi_nomor'),
                'sertifikasi_file' => $image
            ];
            // var_dump($data); die;

            $this->db->where('sertifikasi_id', $id);
            $this->db->update('asset_sertifikasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Asset Sertifikasi berhasil diubah!</div>');
            redirect('/vendor/display_asset');
        }
    }

     public function delete_sertifikasiasset() {
        $id = $this->uri->segment(4);
        $this->db->where('sertifikasi_id',$id);
        $this->db->delete('asset_sertifikasi');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Asset Sertifikasi berhasil dihapus!</div>');

        redirect('/vendor/display_asset');
    }

    public function update_status() { 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kendaraan'] = $this->vendor->getAssetKendaraan($user_id);
        $data['general'] = $this->vendor->getGeneralAsset($user_id);
        $data['sertifikasi'] = $this->vendor->getSertifikasi($user_id);
        $data['vendor'] = $this->vendor->getVendor();

        $this->load->view('view_vendor/header');
        $this->load->view('view_vendor/display_asset', $data);
        $this->load->view('view_vendor/footer');

        $id = $this->input->post('vendor_id');
        $data = [
            'vendor_id' => $this->input->post('vendor_id'),
            'vendor_remark' => 'BELUM TERVERIFIKASI',
            'vendor_status' => '3'
        ];

        // var_dump($data); die;

        $this->db->where('vendor_id', $id);
        $this->db->update('vendor', $data);
        redirect('/vendor/dashboard');
    }
}

