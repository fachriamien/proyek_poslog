<?php
	//membuat class baru inherit CI_Model
class registration_model extends CI_Model
{
	function get_classification(){
		$hasil=$this->db->query("SELECT * FROM classification WHERE class_status = '1'");
		return $hasil->result();
	}

	function get_business_field(){
		$hasil=$this->db->query("SELECT * FROM business_field WHERE business_field_status = '1' ORDER BY business_field_name");
		return $hasil->result();
    }
    
    function get_category_business_field($id){
		$hasil=$this->db->query("SELECT * FROM category WHERE business_field_id = '$id'");
		return $hasil->result();
	}

    function submit_registration(){
        date_default_timezone_set("Asia/Jakarta");
        $vendor_id = "V".date("YmdHis");
        $pic_id = "PIC".date("YmdHis");
		$user_id = $this->session->userdata("user_id");
		$nama_perusahaan = $this->input->post('nama_perusahaan');
        $alamat_lengkap = $this->input->post('alamat_lengkap');
        $provinsi = $this->input->post('provinsi');
        $kota = $this->input->post('kota');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $alamat_full = $alamat_lengkap.', '.$kelurahan.', '.$kecamatan.', '.$kota.', '.$provinsi;
        $postcode = $this->input->post('kode_pos');
        $nomor_telepon = $this->input->post('nomor_telepon');
        $fax = $this->input->post('fax');
        $vendor_email = $this->input->post('vendor_email');
        $pic_nama = $this->input->post('pic_nama');
        $pic_nohp = $this->input->post('pic_nohp');
        $pic_email = $this->input->post('pic_email');
        $pic_gender = $this->input->post('pic_gender');
        $website = $this->input->post('website');
        $business_field = $this->input->post('business_field');
        $category_business_field = $this->input->post('category_business_field');
        if($category_business_field == ''){
            $category_business_field = NULL;
        }
        $classification = $this->input->post('classification');
        $deskripsi_perusahaan = $this->input->post('deskripsi_umum');
        $reg_date = date('Y-m-d H:i:s');

        $dataVendor = array('vendor_id'=>$vendor_id,
        'business_field_id'=>$business_field,
        'class_id'=>$classification,
        'category_id'=>$category_business_field,
        'office_id'=>'OFFICE001',
        'vendor_name'=>$nama_perusahaan,
        'vendor_desc'=>$deskripsi_perusahaan,
        'address'=>$alamat_full,
        'regency_id'=>'REGENCY001',
        'postcode'=>$postcode,
        'vendor_email'=>$vendor_email,
        'vendor_phone'=>$nomor_telepon,
        'vendor_fax'=>$fax,
        'vendor_website'=>$website,
        'reg_date'=>$reg_date,
        'user_id'=>$user_id,
        'vendor_status'=>'1');
        
        $dataPIC = array('pic_id'=>$pic_id,
        'vendor_id'=>$vendor_id,
        'role_id'=>'ROLE001',
        'pic_name'=>$pic_nama,
        'pic_gender'=>$pic_gender,
        'pic_email'=>$pic_email,
        'pic_phone'=>$pic_nohp,
        'pic_status'=>'1');

        $this->db->insert('vendor', $dataVendor);
		$this->db->insert('pic', $dataPIC);
    }
    
    function get_validate_registed_or_not(){
        $user_id = $this->session->userdata("user_id");
		$query = $this->db->query("SELECT * FROM vendor WHERE user_id = '$user_id'");
		return $query->num_rows();
    }
    
    function get_registration_data_vendor(){
        $user_id = $this->session->userdata("user_id");
		return $this->db->query("SELECT v.vendor_name, v.vendor_desc, v.address, v.postcode, v.vendor_email, v.vendor_phone, v.vendor_fax, v.vendor_website, bf.business_field_name AS 'bisnis_utama', c.category_name, cl.class_name FROM vendor v 
        JOIN business_field bf ON bf.business_field_id = v.business_field_id
        LEFT JOIN category c ON c.category_id = v.category_id
        JOIN classification cl ON cl.class_id = v.class_id
        WHERE user_id = '$user_id'")->row();
    }
    
    function get_registration_data_pic(){
        $user_id = $this->session->userdata("user_id");
        $vendor_id = $this->db->query("SELECT * FROM vendor WHERE user_id = '$user_id'")->row()->vendor_id;
        return $this->db->query("SELECT * FROM pic WHERE vendor_id = '$vendor_id'")->row();
	}
}
?>