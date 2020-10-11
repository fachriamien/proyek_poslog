<?php

class model_bod extends CI_Model
{
    public function getDataVendor(){
       $this->db->select('*');
       $this->db->from('vendor');
       $query = $this->db->get();
       return $query->result_array();
    }

    // public function getDetailVendor($id){
    //     $this->db->where('vendor_id', $id);
    //     $query = $this->db->get('vendor');
    //     return $query->row_array();
    // }  

    public function getDetailVendor($id){
        $hasil = $this->db->query("SELECT vendor.vendor_name, vendor.address, vendor.vendor_fax, vendor.postcode, vendor.vendor_phone, vendor.vendor_email, 
        vendor.vendor_email, vendor.vendor_desc, business_field.business_field_name, classification.class_name from vendor
        INNER JOIN business_field ON business_field.business_field_id = vendor.business_field_id 
        INNER JOIN classification ON classification.class_id = vendor.class_id WHERE vendor_id = $id");
        return $hasil->row_array();
    }
}
?>