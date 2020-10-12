<?php

class login_model extends CI_Model
{
    function cek_login(){
        $username = $this->input->post('kar_username');
        $password = $this->input->post('kar_kata_sandi');

        $tampil = $this->db->query("SELECT u.user_id, u.fullname, u.username, u.password, l.level_id as level_id, 
        l.level_name as level_name FROM user u
        JOIN level l ON l.level_id = u.level_id
        WHERE u.username = '$username' AND u.password = '$password' AND u.user_status = 1");

        return $tampil;
    }
}

?>
