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
		$this->load->model('bahan_model');
		$bahan = $this->bahan_model->get(array('kategori'=>1));
		$this->load->view('index',array('bahan'=>$bahan));
	}

	public function sop_isma()
	{
		$data = array('content'=>'dokumen/sop_isma.php', 'judul'=>'SOP ISMA' );
		$this->load->view('index_all', $data);
	}

	public function sop_inspektorat(){
		$data = array('content'=>'dokumen/sop.php', 'judul'=>'SOP Inspektorat' );
		$this->load->view('index_all', $data);
	}

	public function proses_bisnis(){
		$data = array('content'=>'dokumen/probis.php', 'judul'=>'Proses Bisnis Inspektorat' );
		$this->load->view('index_all', $data);
	}

	public function informasi_kecuali(){
		$data = array('content'=>'dokumen/informasi_kecuali.php', 'judul'=>'Informasi yang dikecualikan' );
		$this->load->view('index_all', $data);
	}

	public function maklumat_pelayanan(){
		$data = array('content'=>'dokumen/makluman_pelayanan.php', 'judul'=>'Maklumat Pelayanan' );
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

	public function tutorial_bahan($aksi = null){
		$this->load->model('bahan_model');
		if($aksi == null || $aksi == 'tutorial'){
			$bahan = $this->bahan_model->get(array('kategori'=>0));
		}else{
			$bahan = $this->bahan_model->get(array('kategori'=>1));
		}
		$this->load->view('index_all.php',array('content'=> 'dokumen/bahan.php', 'bahan'=>$bahan, 'judul'=>$aksi == null || $aksi == 'tutorial' ? 'Tutorial' : 'Bahan Paparan'));
	}

	public function rekap_survei(){
		$this->load->view('index_all.php',array('content'=> 'dokumen/hasil_survei_kepuasan.php', 'judul'=>'Rekap Survei Kepuasan Inspektorat'));
	}

	public function profil_organisasi(){
		$this->load->view('index_all.php', array('content'=>'profil.php','judul'=>'Profil Organisasi'));
	}

	public function logout(){
		$this->session->unset_userdata('login_iman');
		$this->session->unset_userdata('user_id_iman');
		$this->session->unset_userdata('role_iman');
		$this->session->unset_userdata('nama_iman');
		$this->session->unset_userdata('foto_iman');
		redirect(base_url());
	}
}
