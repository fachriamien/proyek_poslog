<?php
class dokumen_model extends CI_Model
{
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

    function get_vendor(){
        $userid = $this->session->userdata('user_id');

        $tampil = $this->db->query("SELECT v.vendor_id, v.vendor_name, v.vendor_remark, v.vendor_status FROM vendor v 
        JOIN user u ON v.user_id = u.user_id 
        WHERE u.user_id = '$userid'");

        return $tampil;
    }

    function save_dokumen(){
        $config['upload_path']          = '././assets/upload/';
		$config['allowed_types']        = 'pdf|png';
		$config['max_size']             = 2000;
		$config['encrypt_name'] 		= true;
		$this->load->library('upload',$config);
        $jumlah_berkas = count($_FILES['dokumen']['name']);
        // echo $jumlah_berkas;
        // exit();
        $doc_type_id = $this->input->post('doc_type_id');
		if (is_array($doc_type_id) || is_object($doc_type_id))
		{
			foreach ($doc_type_id as $row) {
                $i = 0;
                if(!empty($_FILES['dokumen']['name'][$i])){
 
                    $_FILES['file']['name'] = $_FILES['dokumen']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['dokumen']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['dokumen']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['dokumen']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['dokumen']['size'][$i];
           
                    if($this->upload->do_upload('file')){
                        $id = $this->db->query("SELECT MAX(doc_id) as id FROM document")->row();
                        $max_doc_id = $id->id + 1;
                        $uploadData = $this->upload->data();
                        $data['doc_id'] = $max_doc_id;
                        $data['vendor_id'] = $this->input->post('vendor_id');
                        $data['doc_type_id'] = $row;
                        $data['doc_file'] = $uploadData['file_name'];
                        $this->db->insert('document',$data);
                    }
                    $i++;
                } else {
                    $i++;
                    continue;
                }
                
			}
        }
        $update = array('vendor_remark'=>"BELUM TERVERIFIKASI", 'vendor_status'=>'2');
        $this->db->where('vendor_id', $this->input->post('vendor_id'));
		$this->db->update('vendor', $update);
    }
}
?>