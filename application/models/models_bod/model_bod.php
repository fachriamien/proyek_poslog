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
        $hasil = $this->db->query("SELECT vendor.vendor_id, vendor.vendor_name, vendor.address, vendor.vendor_fax, vendor.postcode, vendor.vendor_phone, vendor.vendor_email, 
        vendor.vendor_email, vendor.vendor_website, vendor.vendor_desc, business_field.business_field_name, classification.class_name, category.category_name from vendor
        INNER JOIN business_field ON business_field.business_field_id = vendor.business_field_id 
        INNER JOIN category ON category.category_id = vendor.category_id
        INNER JOIN classification ON classification.class_id = vendor.class_id WHERE vendor_id = '$id'");
        return $hasil->row_array();
    }

    // public function getBerkasVendor($id){
    //     $hasil = $this->db->query("SELECT vendor.vendor_id, vendor.vendor_name, vendor.address, vendor.vendor_fax, vendor.postcode, vendor.vendor_phone, vendor.vendor_email, 
    //     vendor.vendor_email, vendor.vendor_desc, business_field.business_field_name, classification.class_name from vendor
    //     INNER JOIN business_field ON business_field.business_field_id = vendor.business_field_id 
    //     INNER JOIN classification ON classification.class_id = vendor.class_id WHERE vendor_id = '$id'");
    //     return $hasil->row_array();
    // }

    function getVendorPIC($id){
        $hasil = $this->db->query("SELECT * from pic WHERE vendor_id = '$id'");
        return $hasil->row_array();
    }

    function get_dokumen_type(){
        $tampil = $this->db->query("SELECT * FROM document_type WHERE doc_type_status = 1");

        if($tampil->num_rows() > 0)
        {
            //perulangan untuk setiap data yang ditemukan
            //akan diletakkan pada variabel $data
            foreach($tampil->result() as $data)
            {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function get_dokumen_group(){
        $tampil = $this->db->query("SELECT * FROM document_group WHERE doc_group_status = 1");

        if($tampil->num_rows() > 0)
        {
            //perulangan untuk setiap data yang ditemukan
            //akan diletakkan pada variabel $data
            foreach($tampil->result() as $data)
            {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function get_vendor($id){

        $tampil = $this->db->query("SELECT vendor.vendor_id, vendor.vendor_name, vendor.vendor_remark, vendor.vendor_status FROM vendor 
        JOIN user ON vendor.user_id = user.user_id 
        WHERE user.user_id = '$id'");

        return $tampil->row_array();
    }

    function getDokumen($id){
        $hasil = $this->db->query("SELECT vendor.vendor_id, vendor.vendor_name, document_type.doc_type_name, document_type.doc_group_id, document.doc_file from document
        INNER JOIN vendor on vendor.vendor_id = document.vendor_id
        INNER JOIN document_type on document_type.doc_type_id = document.doc_type_id
        where document.vendor_id = '$id'");

        return $hasil->result_array();
    }

    function verifikasiVendor($id){
        $this->db->where('vendor_id', $id);
        $update = array('vendor_remark' => )
        $hasil =   
        

    }
}
?>