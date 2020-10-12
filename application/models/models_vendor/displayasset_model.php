<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class displayasset_model extends CI_Model {
  public function getAssetKendaraan() {
    $query = "SELECT `asset_kendaraan`.*, `vendor`.`vendor_name`
              FROM `asset_kendaraan` JOIN `vendor`
              ON `vendor`.`vendor_id` = `asset_kendaraan`.`vendor_id`
              ";
    return $this->db->query($query)->result_array();
  }

  public function getVendor() {
    $query = "SELECT *
              FROM `vendor`
              ";
    return $this->db->query($query)->result_array();
  }

  public function getGeneralAsset() {
    $query = "SELECT `asset_general`.*, `vendor`.`vendor_name`
              FROM `asset_general` JOIN `vendor`
              ON `vendor`.`vendor_id` = `asset_general`.`vendor_id`
              ";
    return $this->db->query($query)->result_array();
  }

  public function getSertifikasi(){
    $query = "SELECT `asset_sertifikasi`.*, `vendor`.`vendor_name`
              FROM `asset_sertifikasi` JOIN `vendor`
              ON `vendor`.`vendor_id` = `asset_sertifikasi`.`vendor_id`
              ";
    return $this->db->query($query)->result_array();
  }

  public function uploadImage() {
        $config['upload_path'] = './assets/upload/img_displayasset';
        $config['allowed_types'] = 'jpg|png|jpeg';
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