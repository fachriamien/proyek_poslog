<?php
class login extends CI_Controller
{

	function index(){
		$this->load->view('login_view');
	}

	function aksi_login(){

		$this->load->model('login_model');

		$cek = $this->login_model->cek_login()->num_rows();

		if($cek > 0){
			$user_id = $this->login_model->cek_login()->row()->user_id;
			$fullname = $this->login_model->cek_login()->row()->fullname;
			$username = $this->login_model->cek_login()->row()->username;
			$cek_level = $this->login_model->cek_login()->row()->level_id;
			$level_nama = $this->login_model->cek_login()->row()->level_name;

			$nickname = explode(" ", $fullname);
			$name = $nickname[0]." ".$nickname[1];

			$data_session = array(
				'user_id' => $user_id,
				'nama' => $name,
				'username' => $username,
				'level'=> $cek_level,
				'level_nama' => $level_nama,
				'status_login' => "4V050oXlAMwyba8kkr5Q"
			);

			$this->session->set_userdata($data_session);

			if($cek_level == "1")
			{
				redirect(base_url('index.php/vendor/dashboard'));
			}
			else if($cek_level == "2")
			{
				redirect(base_url('index.php/divpengadaan/dashboard'));
			}
			else if($cek_level == "3")
			{
				redirect(base_url('index.php/bod/dashboard'));
			}
		}
		else
		{
			$this->session->set_flashdata('error','Action Not Completed');
			redirect(base_url('index.php/login'));
		}

	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('index.php/login'));
	}

}


?>
