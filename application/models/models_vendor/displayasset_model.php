<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class displayasset_model extends CI_Model {
  public function getAssetKendaraan(){
    $query = "SELECT `asset_kendaraan`.*, `vendor`.`vendor_name`
              FROM `asset_kendaraan` JOIN `vendor`
              ON `vendor`.`vendor_id` = `asset_kendaraan`.`vendor_id`
              ";
    return $this->db->query($query)->result_array();
  }

  public function getVendor(){
    $query = "SELECT *
              FROM `vendor`
              ";
    return $this->db->query($query)->result_array();
  }

  public function getGeneralAsset(){
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
}