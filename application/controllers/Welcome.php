<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('index');
	}

	public function sop_isma()
	{
		$data = array('content'=>'dokumen/sop_isma.php', 'judul'=>'SOP ISMA' );
		$this->load->view('index_all', $data);
	}

	public function sop_tl()
	{
		$data = array('content'=>'dokumen/sop_tl.php', 'judul'=>'SOP Tindak Lanjut Audit' );
		$this->load->view('index_all', $data);
	}

	public function piagam_audit()
	{
		$data = array('content'=>'dokumen/piagam_audit.php', 'judul'=>'Internal Audit Charter' );
		$this->load->view('index_all', $data);
	}

	public function do_login(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST'){
			$login = $this->user_model->login($this->input->post('username'), $this->input->post('password'));
			if($login->num_rows() > 0){
				$data = $login->row_array();
				$this->session->set_userdata('login_iman',TRUE);
				$this->session->set_userdata('user_id_iman',$data['user_id']);
				$this->session->set_userdata('role_iman',$data['role']);
				$this->session->set_userdata('nama_iman',$data['nama']);
				$this->session->set_userdata('foto_iman',$data['foto']);
				redirect('welcome');
			}else{
				$component = array(
					"pesan" => "Periksa Kembali Username dan Password Anda"
				);
				$this->load->view("index", $component);
			}
		}else{
			$this->load->view("index");
		}
	}

	function logout(){
		$this->session->unset_userdata('login_iman');
		$this->session->unset_userdata('user_id_iman');
		$this->session->unset_userdata('role_iman');
		$this->session->unset_userdata('nama_iman');
		$this->session->unset_userdata('foto_iman');
		redirect(base_url());
	}
}
