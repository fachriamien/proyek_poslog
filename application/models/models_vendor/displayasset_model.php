<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class displayasset_model extends CI_Model {
  public function getAssetKendaraan($user_id) {
    $query = "SELECT asset_kendaraan.*, user.user_id, vendor.vendor_name
              FROM asset_kendaraan 
              LEFT JOIN vendor
              ON vendor.vendor_id = asset_kendaraan.vendor_id
              LEFT JOIN user
              ON user.user_id = asset_kendaraan.user_id
              WHERE user.user_id = '$user_id'
              ";
    return $this->db->query($query)->result_array();
  }

  public function getVendor() {
    $query = "SELECT *
              FROM `vendor`
              ";
    return $this->db->query($query)->result_array();
  }

  public function getGeneralAsset($user_id) {
    $query = "SELECT asset_general.*, user.user_id, vendor.vendor_name
              FROM asset_general 
              LEFT JOIN vendor
              ON vendor.vendor_id = asset_general.vendor_id
              LEFT JOIN user
              ON user.user_id = asset_general.user_id
              WHERE user.user_id = '$user_id'
              ";
    return $this->db->query($query)->result_array();
  }

  public function getSertifikasi($user_id){
    $query = "SELECT asset_sertifikasi.*, vendor.vendor_name
              FROM asset_sertifikasi 
              LEFT JOIN vendor
              ON vendor.vendor_id = asset_sertifikasi.vendor_id
              LEFT JOIN user
              ON user.user_id = asset_sertifikasi.user_id
              WHERE user.user_id = '$user_id'
              ";
    return $this->db->query($query)->result_array();
  }

  public function uploadImage() {
        $config['upload_path'] = './assets/upload/img_displayasset';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
        $config['max_size'] = 8192;
        $config['encrypt_name'] = true;  

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('sertifikasi_file')) { //Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function get_image($sertifikasi_id)
    {
        $this->db->select('sertifikasi_file');
        $this->db->from('asset_sertifikasi');
        $this->db->where('sertifikasi_id', $sertifikasi_id);
        return $this->db->get()->row();
    }

}