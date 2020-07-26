<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skp extends CI_Controller {

	public function __construct(){
			parent::__construct();
			if($this->session->userdata('login_iman') != true){
					$data = array(
						'content'=>'login_dulu.php',
						'judul'=>'Harap Login Terlebih Dahulu',
					);
					$this->load->view('index_all', $data);
			}
	}

	public function index()
	{
				$sasaranKegiatans = $this->skp_model->getAllSasaranKegiatan();
				//$sasaranKegiatans = $this->skp_model->getSasaranKegiatanByParentId(0);
				$data = array(
					'content'=>'skp/index_skp.php',
					'judul'=>'Perjanjian Kinerja',
					'sasaranKegiatans'=>$sasaranKegiatans
				);
				$this->load->view('index_all', $data);
	}

	public function tambah_sasaran_kegiatan()
	{
				$sasaranKegiatans = $this->skp_model->getAllSasaranKegiatan();
				$data = array(
					'content'=>'skp/tambah_sasaran_kegiatan.php',
					'judul'=>'Tambah Sasaran Kegiatan',
					'sasaranKegiatans'=>$sasaranKegiatans
				);
				$this->load->view('index_all', $data);
	}

	public function proses_sasaran_kegiatan()
	{
		for($i=0; $i<count($this->input->post('nama_sasaran_kegiatan')) ; $i++ ){
			$sasaranKegiatan = array(
					"nama_sasaran_kegiatan" => $this->input->post('nama_sasaran_kegiatan')[$i],
					"id_parent" => $this->input->post('id_parent')
			);
			$this->skp_model->create_sasaran_kegiatan($sasaranKegiatan);
		}
		redirect(base_url("index.php/skp"));
	}

	public function edit_indikator_kinerja()
	{

				$postData = $this->input->post(NULL, TRUE);// Null true  to return data filtered through the XSS filter.
        $id_indikator_kinerja=$this->input->post("id_indikator_kinerja");
        $this->skp_model->update($id_indikator_kinerja,$postData);
        return redirect(base_url('skp'));
	}



	public function proses_indikator_kinerja()
	{
				for($i=0; $i<count($this->input->post('indikatorKinerja')) ; $i++ ){
						$indikatorKinerja =	array (
											'id_sasaran_kegiatan' =>$this->input->post('id_sasaran_kegiatan'),
											'id_indikator_parent' => $this->input->post('id_indikator_parent'),
											'nama_indikator_kinerja' => $this->input->post('indikatorKinerja')[$i],
											'target' => $this->input->post('target')[$i]
				 						);
						$this->skp_model->create_indikator_kinerja($indikatorKinerja);
				}
				redirect(base_url("index.php/skp"));
	}
}
