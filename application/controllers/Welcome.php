<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

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
		$bahan = $this->bahan_model->get(array('kategori' => 1));
		$this->load->view('index', array('bahan' => $bahan));
	}

	public function sop_isma()
	{
		$data = array('content' => 'dokumen/sop_isma.php', 'judul' => 'SOP ISMA');
		$this->load->view('index_all', $data);
	}

	public function sop_inspektorat()
	{
		$data = array('content' => 'dokumen/sop.php', 'judul' => 'SOP Inspektorat');
		$this->load->view('index_all', $data);
	}

	public function proses_bisnis()
	{
		$data = array('content' => 'dokumen/probis.php', 'judul' => 'Proses Bisnis Inspektorat');
		$this->load->view('index_all', $data);
	}

	public function informasi_kecuali()
	{
		$data = array('content' => 'dokumen/informasi_kecuali.php', 'judul' => 'Informasi yang dikecualikan');
		$this->load->view('index_all', $data);
	}

	public function maklumat_pelayanan()
	{
		$data = array('content' => 'dokumen/makluman_pelayanan.php', 'judul' => 'Maklumat Pelayanan');
		$this->load->view('index_all', $data);
	}

	public function sop_tl()
	{
		$data = array('content' => 'dokumen/sop_tl.php', 'judul' => 'SOP Tindak Lanjut Audit');
		$this->load->view('index_all', $data);
	}

	public function piagam_audit()
	{
		$data = array('content' => 'dokumen/piagam_audit.php', 'judul' => 'Internal Audit Charter');
		$this->load->view('index_all', $data);
	}

	public function do_login()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$login = $this->user_model->login($this->input->post('username'), $this->input->post('password'));
			if ($login->num_rows() > 0) {
				$data = $login->row_array();
				$this->session->set_userdata('login_iman', TRUE);
				$this->session->set_userdata('user_id_iman', $data['user_id']);
				$this->session->set_userdata('role_iman', $data['role']);
				$this->session->set_userdata('nama_iman', $data['nama']);
				$this->session->set_userdata('foto_iman', $data['foto']);
				redirect('welcome');
			} else {
				$component = array(
					"pesan" => "Periksa Kembali Username dan Password Anda"
				);
				$this->load->view("index", $component);
			}
		} else {
			$this->load->view("index");
		}
	}

	public function tutorial_bahan($aksi = null)
	{
		$this->load->model('bahan_model');
		if ($aksi == null || $aksi == 'tutorial') {
			$bahan = $this->bahan_model->get(array('kategori' => 0));
		} else {
			$bahan = $this->bahan_model->get(array('kategori' => 1));
		}
		$this->load->view('index_all.php', array('content' => 'dokumen/bahan.php', 'bahan' => $bahan, 'judul' => $aksi == null || $aksi == 'tutorial' ? 'Tutorial' : 'Bahan Paparan'));
	}

	public function rekap_survei()
	{
		$this->load->view('index_all.php', array('content' => 'dokumen/hasil_survei_kepuasan.php', 'judul' => 'Rekap Survei Kepuasan Inspektorat'));
	}

	public function profil_organisasi()
	{
		$this->load->view('index_all.php', array('content' => 'profil.php', 'judul' => 'Profil Organisasi'));
	}

	public function get_slider()
	{
		$sliders = $this->content_model->getSlider();
		$data = array(
			'content' => 'admin/sliders/index.php',
			'sliders' => $sliders,
			'judul' => 'Slider'
		);
		$this->load->view('index_all.php', $data);
	}

	public function create_slider()
	{
		$slider = new class
		{
		};
		$slider->caption = '';
		$slider->url = '';
		$slider->active = '';
		if ($this->input->method(TRUE) == "POST") {
			$slider->caption = $this->input->post('caption');
			$slider->active = $this->input->post('active');
			$config['upload_path']          = './assets/template/img';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			$config['file_name'] = md5(uniqid(mt_rand())).".".$file_ext;

			$this->load->library('upload', $config);
			if($this->upload->do_upload('file')){
				// Get data about the file
  
				$uploadData = $this->upload->data();
				$filename = $config['upload_path'].'/'.$uploadData['file_name'];
  
				// Initialize array
				if($filename!=""){
				  $slider->url=$this->upload->data('file_name');
				}
			}
			$this->content_model->create_one('sliders', $slider);
			return redirect(base_url('welcome/get_slider'));
		}
		$data = array(
			'content' => 'admin/sliders/create.php',
			'slider' => $slider,
			'judul' => 'Slider'
		);
		$this->load->view('index_all.php', $data);
	}

	public function edit_slider($id)
	{
		$slider = $this->content_model->getSlider(array('id_slider' => $id));
		if (count($slider) < 1) {
			return redirect(base_url());
		}
		if ($this->input->method(TRUE) == "POST") {
			$slider = $slider[0];
			$slider->caption = $this->input->post('caption');
			$slider->active = $this->input->post('active');
			$config['upload_path']          = './assets/template/img';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			$config['file_name'] = md5(uniqid(mt_rand())).".".$file_ext;

			$this->load->library('upload', $config);
			if($this->upload->do_upload('file')){
				// Get data about the file
  
				$uploadData = $this->upload->data();
				$filename = $config['upload_path'].'/'.$uploadData['file_name'];
  
				// Initialize array
				if($filename!=""){
				  $slider->url=$this->upload->data('file_name');
				}
			}
			$this->content_model->update('sliders',array('id_sliders'=>$id), $slider);
			return redirect(base_url('welcome/get_slider'));
		}
		$data = array(
			'content' => 'admin/sliders/update.php',
			'slider' => $slider[0],
			'judul' => 'Slider',
			'id'=>$id
		);
		$this->load->view('index_all.php', $data);
	}

	public function get_schedule()
	{
		$schdules = $this->content_model->getSchedule();
		$data = array(
			'content' => 'admin/schedule/index.php',
			'schedules' => $schdules,
			'judul' => 'Schdule'
		);
		$this->load->view('index_all.php', $data);
	}

	public function create_schedule()
	{
		$schedule = new class
		{
		};
		$schedule->caption = '';
		$schedule->tanggal = '';
		$schedule->active = '';
		if ($this->input->method(TRUE) == "POST") {
			$schedule->caption = $this->input->post('caption');
			$schedule->active = $this->input->post('active');
			$schedule->tanggal = $this->input->post('tanggal');
			$this->content_model->create_one('schedule', $schedule);
			return redirect(base_url('welcome/get_schedule'));
		}
		$data = array(
			'content' => 'admin/schedule/create.php',
			'schedule' => $schedule,
			'judul' => 'Schedule'
		);
		$this->load->view('index_all.php', $data);
	}

	public function edit_schedule($id)
	{
		$schedule = $this->content_model->getSchedule(array('id_schedule' => $id));
		if (count($schedule) < 1) {
			return redirect(base_url());
		}
		if ($this->input->method(TRUE) == "POST") {
			$schedule = $schedule[0];
			$schedule->caption = $this->input->post('caption');
			$schedule->active = $this->input->post('active');
			$this->content_model->update('schedule',array('id_schedule'=>$id), $schedule);
			return redirect(base_url('welcome/get_schedule'));
		}
		$data = array(
			'content' => 'admin/schedule/update.php',
			'schedule' => $schedule[0],
			'judul' => 'Schedule',
			'id'=>$id
		);
		$this->load->view('index_all.php', $data);
	}

	public function get_news()
	{
		$news = $this->content_model->getNews();
		$data = array(
			'content' => 'admin/news/index.php',
			'news' => $news,
			'judul' => 'News'
		);
		$this->load->view('index_all.php', $data);
	}

	public function create_news()
	{
		$news = new class
		{
		};
		$news->judul = '';
		$news->url = '';
		$news->active = '';
		$news->date='';
		$news->content='';
		$news->selengkapnya='';
		if ($this->input->method(TRUE) == "POST") {
			$news->judul = $this->input->post('judul');
			$news->active = $this->input->post('active');
			$news->date = $this->input->post('date');
			$news->content = $this->input->post('content');
			$news->selengkapnya=$this->input->post('selengkapnya');
			$config['upload_path']          = './assets/template/img';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			$config['file_name'] = md5(uniqid(mt_rand())).".".$file_ext;

			$this->load->library('upload', $config);
			if($this->upload->do_upload('file')){
				// Get data about the file
  
				$uploadData = $this->upload->data();
				$filename = $config['upload_path'].'/'.$uploadData['file_name'];
  
				// Initialize array
				if($filename!=""){
				  $news->url=$this->upload->data('file_name');
				}
			}
			$this->content_model->create_one('news', $news);
			return redirect(base_url('welcome/get_news'));
		}
		$data = array(
			'content' => 'admin/news/create.php',
			'news' => $news,
			'judul' => 'News'
		);
		$this->load->view('index_all.php', $data);
	}

	public function edit_news($id)
	{
		$news = $this->content_model->getNews(array('id_news' => $id));
		if (count($news) < 1) {
			return redirect(base_url());
		}
		if ($this->input->method(TRUE) == "POST") {
			$news = $news[0];
			$news->judul = $this->input->post('judul');
			$news->active = $this->input->post('active');
			$news->date = $this->input->post('date');
			$news->content = $this->input->post('content');
			$news->selengkapnya=$this->input->post('selengkapnya');
			$config['upload_path']          = './assets/template/img';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			$config['file_name'] = md5(uniqid(mt_rand())).".".$file_ext;

			$this->load->library('upload', $config);
			if($this->upload->do_upload('file')){
				// Get data about the file
  
				$uploadData = $this->upload->data();
				$filename = $config['upload_path'].'/'.$uploadData['file_name'];
  
				// Initialize array
				if($filename!=""){
				  $news->url=$this->upload->data('file_name');
				}
			}
			$this->content_model->update('news',array('id_newss'=>$id), $news);
			return redirect(base_url('welcome/get_news'));
		}
		$data = array(
			'content' => 'admin/news/update.php',
			'news' => $news[0],
			'judul' => 'News',
			'id'=>$id
		);
		$this->load->view('index_all.php', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('login_iman');
		$this->session->unset_userdata('user_id_iman');
		$this->session->unset_userdata('role_iman');
		$this->session->unset_userdata('nama_iman');
		$this->session->unset_userdata('foto_iman');
		redirect(base_url());
	}
}
