<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {




	public function index()
	{
		if($this->session->userdata('login_iman') != true){
				$data = array(
					'content'=>'login_dulu.php',
					'judul'=>'Harap Login Terlebih Dahulu',
				);
				$this->load->view('index_all', $data);
		}else{
				$users = $this->user_model->get_user_by_role("insp");
				$tasks = $this->task_model->getAllTask();
				$hitungan_proyeks = array();
				foreach ($users as $user ) {
					$hitungan_proyeks[$user["nama"]] = array(
						"todo"=> $this->task_model->count_status_by_user(1, $user["user_id"]),
						"progress"=>$this->task_model->count_status_by_user(2, $user["user_id"]),
						"done"=>$this->task_model->count_status_by_user(3, $user["user_id"])
					);
				};
				$data = array(
					'content'=>'task/perorang.php',
					'judul'=>'Task Perorang',
					'hitungan_proyeks'=>$hitungan_proyeks,
					'tasks' => $tasks,
					'users'=>$users,

				);
				$this->load->view('index_all', $data);
		}
	}

	public function semuaTugas()
	{
		if($this->session->userdata('login_iman') != true){
				$data = array(
					'content'=>'login_dulu.php',
					'judul'=>'Harap Login Terlebih Dahulu',
				);
				$this->load->view('index_all', $data);
		}else{
				$status = $this->task_model->getTaskState();
				$task = $this->task_model->getAllTaskGroupByTask();
				$history = $this->task_model->get_history(20);
				$users = $this->user_model->getAllUser();
				$data = array(
					'content'=>'task/semua_tugas.php',
					'id_proyek'=>12,
					'judul'=>"Semua Tugas",
					'status'=> $status,
					'task' => $task,
					'histories' => $history,
					'users' => $users
				);
				$this->load->view('index_all', $data);
			}
	}

	public function semuaTugasTabel(){
		if($this->session->userdata('login_iman') != true){
				$data = array(
					'content'=>'login_dulu.php',
					'judul'=>'Harap Login Terlebih Dahulu',
				);
				$this->load->view('index_all', $data);
		}else{
				if(!empty($_POST)){
					$queryAll = "Select * from ";
					$queryArrPic = array();
					$queryTanggalAwal = "";
					$queryTanggalAkhir = "";
					$search = "";
					(isset($_POST["pic"]))?$queryArrPic = $_POST["pic"]:'';
					(isset($_POST["start_date"]))?$queryTanggalAwal = $_POST["start_date"]:"";
					(isset($_POST["end_date"]))?$queryTanggalAkhir = $_POST["end_date"]:"";
					(isset($_POST["search"]))?$search = $_POST["search"]:"";
					$tasks = $this->task_model->getTaskFilter($queryArrPic, $queryTanggalAwal, $queryTanggalAkhir, $search);
				}else{
						$tasks = $this->task_model->getAllTaskOrderDate();
				}
				$pics = $this->user_model->getAllUser();
				$data = array(
					'content'=>'task/semua_tugas_tabel0.php',
					'judul'=>"Semua Tugas",
					'tasks' =>$tasks,
					'pics' => $pics
				);
				$this->load->view('index_all', $data);
		}
	}

	public function perproyek()
	{
		if($this->session->userdata('login_iman') != true){
			$data = array(
			 'content'=>'login_dulu.php',
			 'judul'=>'Harap Login Terlebih Dahulu',
		 );
		 $this->load->view('index_all', $data);
		}else {
			$proyeks = $this->task_model->getAllProject();
			$jumlah_proyek =  count($proyeks);
			$history = $this->task_model->get_history($jumlah_proyek);
			$hitungan_proyeks = array();
			foreach ($proyeks as $proyek ) {
				// echo "<pre>";
				// print_r($proyek);
				// echo "</pre>";
				$hitungan_proyeks[$proyek["project_name"]] = array(
					"todo"=> $this->task_model->count_status_by_state(1,$proyek["id_project"]),
					"progress"=>$this->task_model->count_status_by_state(2,$proyek["id_project"]),
					"done"=>$this->task_model->count_status_by_state(3,$proyek["id_project"])
				);
			}

			$data = array(
			 	'content'=>'task/perproyek.php',
			 	'judul'=>'Task Kategori',
			 	'proyeks' => $proyeks,
				'histories' => $history,
				"hitungan_proyeks"=>$hitungan_proyeks
			);
			$this->load->view('index_all', $data);
		}
	}

	public function proyek($id_project)
	{
		if($this->session->userdata('login_iman') != true){
			$data = array(
			 'content'=>'login_dulu.php',
			 'judul'=>'Harap Login Terlebih Dahulu',
		 );
		 $this->load->view('index_all', $data);
		}else {
			$proyek = $this->task_model->getProjectById($id_project);
			$status = $this->task_model->getSatatusByProjectId($id_project);
			$task = $this->task_model->getTaskByProject($id_project);
			$history = $this->task_model->get_history_by_id_project($id_project);
			$users = $this->user_model->getAllUser();
			// echo "<pre>";
			// print_r($task);
			// echo "</pre>";
			// die();
			$data = array(
				'content'=>'task/proyekById.php',
				'id_proyek'=>$id_project,
				'judul'=>$proyek["project_name"],
				'status'=> $status,
				'task' => $task,
				'histories' => $history,
				'users' => $users
			);
			$this->load->view('index_all', $data);
		}
	}

	public function editlampiran($id){
		if($this->session->userdata('login_iman') != true){
				$data = array(
					'content'=>'login_dulu.php',
					'judul'=>'Harap Login Terlebih Dahulu',
				);
				$this->load->view('index_all', $data);
		}else{
				$task_detail = $this->task_model->getTaskByTaskId($id);
				$data = array(
					'content'=>'task/tambah_lampiran.php',
					'judul'=> "Tambah Lampiran"
				);
				$this->load->view('index_all', $data);
		}
	}

	public function add_lampiran(){
		// Count total files
		$countfiles = count($_FILES['lampiran']['name']);

		// Looping all files
		$this->task_model->updateTask($this->input->post('id_task_detail'),array('title'=>$this->input->post('title'),'description'=>$this->input->post('description'),'start_date'=>$this->input->post('start_date'),'end_date'=>$this->input->post('end_date')));
		$task_details = $this->task_model->getTaskByTaskId($this->input->post('id_task_detail'));
		$task_detail = isset($task_details)?$task_details:[];
		for($i=0;$i<$countfiles;$i++){

		  if(!empty($_FILES['lampiran']['name'][$i])){

			// Define new $_FILES array - $_FILES['file']
			$nama = explode(" ",$this->session->userdata()['nama_iman']);
			$_FILES['file']['name'] = $_FILES['lampiran']['name'][$i];
			$_FILES['file']['type'] = $_FILES['lampiran']['type'][$i];
			$_FILES['file']['tmp_name'] = $_FILES['lampiran']['tmp_name'][$i];
			$_FILES['file']['error'] = $_FILES['lampiran']['error'][$i];
			$_FILES['file']['size'] = $_FILES['lampiran']['size'][$i];
			$file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

			// Set preference
			$config['upload_path'] = 'assets/task/id_detail_'.$task_detail['id_detail'];
			$config['allowed_types'] = '*';
			$config['max_size'] = '20000'; // max_size in kb
			//$config['encrypt_name'] = TRUE;
			$config['file_name'] = $nama[0]."_".md5(uniqid(mt_rand())).".".$file_ext;
			if(is_dir($config['upload_path'])===false){
				mkdir($config['upload_path'],0777, true);
			}
			//Load upload library
			$this->load->library('upload',$config);

			// File upload
			if($this->upload->do_upload('file')){
			  // Get data about the file
			  
			  $uploadData = $this->upload->data();
			  $filename = $config['upload_path'].'/'.$uploadData['file_name'];

			  // Initialize array
			  if($filename!=""){
				$this->task_model->create_lampiran(array('link'=>$filename,'id_task_detail'=>$this->input->post('id_task_detail')));
			  }

			}
			else{
				echo "error";
				print_r($_FILES['file']);
			}
		  }

		}
		$link = explode(",",$this->input->post('link'));
		foreach ($link as $key => $value) {
			# code...
			if($value!="")
			{$this->task_model->create_lampiran_link(array('link'=>$value,'id_task_detail'=>$this->input->post('id_task_detail')));}
		}
		$task_status = $this->task_model->getStatusByStatusId($task_detail["id_status"]);
		return redirect(base_url()."index.php/task/proyek/".$task_status["id_project"]);
	}

	public function hapuslampiran(){
		$this->task_model->remove_lampiran($this->input->post('id_task_lampiran'));
		$lams = $this->task_model->getLampiranTask($this->input->post('id_task_detail'));
		if($lams){
			foreach ($lams as $key => $value) {
				# code...
				$no = $key +1;
				echo '<a href="'.base_url().$value['link'].'">Lampiran '.$no.'</a><button class="btn btn-danger" onclick="hapusLampiran('.$value['id_task_lampiran'].','.$value['id_task_detail'].')">Hapus</button>';
				echo "<br>";
			}
		}
	}
	public function hapuslampiranlink(){
		$this->task_model->remove_lampiran_link($this->input->post('id_task_lampiran_link'));
		$lams = $this->task_model->getLampiranLinkTask($this->input->post('id_task_detail'));
		if($lams){
			foreach ($lams as $key => $value) {
				# code...
				$no = $key +1;
				echo '<a href="'.$value['link'].'">Lampiran '.$no.'</a><button class="btn btn-danger" onclick="hapusLampiranLink('.$value['id_task_lampiran_link'].','.$value['id_task_detail'].')">Hapus</button>';
				echo "<br>";
			}
		}
	}
	public function getmodal($id){
		$task = $this->task_model->getTaskByTaskId($id);
		$task_lampiran = $this->task_model->getLampiranTask($id);
		$task_lampiran_link = $this->task_model->getLampiranLinkTask($id);
		$data = array(
			'task'=>$task,
			'task_lampiran'=> $task_lampiran,
			'task_lampiran_link'=>$task_lampiran_link,
			'id_detail'=>$id
		);
		$this->load->view('task/modal_lampiran.php',$data);
	}

	public function getmodaluser($id){
		$users = $this->user_model->getAllUser();
		$user = $this->task_model->getTaskByTaskId($id);
		$petugas = $this->task_model->getPetugasTask($id);
		// var_dump($id);

		// exit;
		$data = array(
			'user'=>$user,
			'users'=> $users,
			'petugas'=>$petugas,
			'id_task_detail'=>$id
		);
		$this->load->view('task/modal_user.php',$data);
	}

	public function addpetugas(){
		$this->task_model->remove_petugasbyIdTask($this->input->post('id_task_detail'));
		foreach ($this->input->post('petugas') as $key => $value) {
			# code...
			$this->task_model->create_petugas(array('id_task_detail'=>$this->input->post('id_task_detail'),'id_user'=>$value));
		}
		return redirect(base_url()."index.php/task/perproyek");
	}
	public function updateTaskStatus($id_detail, $id_status)//dipake ajax untuk update
	{
			$task_detail = $this->task_model->getTaskByTaskId($id_detail);
			$status_awal = $task_detail["status_name"];
			$id_proyek = $task_detail["id_project"];
			$status_baru = $this->task_model->getStatusByStatusId($id_status)["status_name"];
			$this->task_model->updateTaskStatus($id_detail, $id_status);
			$id_user = $this->session->userdata()['user_id_iman'];
			$nama_user = $this->session->userdata()['nama_iman'];
			$data_history = array(
				"history_name" => $nama_user." memindahkan tugas ". $task_detail["nama"]  ."  '". $task_detail["title"] ."' dari status ". $status_awal ." menjadi ". $status_baru,
				"id_creator" => $id_user,
				"id_project" => $id_proyek,
				"id_task" => $id_detail
			);
			$this->task_model->create_history($data_history);
			return 1;
	}

	public function tambah_proyek()
	{
		if($this->session->userdata('login_iman') != true){
				$data = array(
					'content'=>'login_dulu.php',
					'judul'=>'Harap Login Terlebih Dahulu',
				);
				$this->load->view('index_all', $data);
		}else{
				$id_user = $this->session->userdata()['user_id_iman'];
				$nama_user = $this->session->userdata()['nama_iman'];
				$nama_proyek= $_POST["nama_proyek"];
				$data = array(
					"project_name" => $nama_proyek,
					"id_creator" => $id_user,
					"start_date" => $_POST["start_date"],
					"end_date" => $_POST["end_date"],
				);
				$result = $this->task_model->create_proyek($data);
				$this->task_model->create_status(array(
					"status_name" => "To Do" ,
					"id_project" => $result,
					"id_state" => 1
				));
				$this->task_model->create_status(array(
					"status_name" => "In Progress" ,
					"id_project" => $result,
					"id_state" => 2
				));
				$this->task_model->create_status(array(
					"status_name" => "Done" ,
					"id_project" => $result,
					"id_state" => 3
				));


				if($result){
					$data_history = array(
						"history_name" => $nama_user." membuat proyek '".$_POST["nama_proyek"] ."'" ,
						"id_creator" => $id_user,
						"id_project" => $result,
					);
					$this->task_model->create_history($data_history);
				}

				redirect(base_url("index.php/task/perproyek"));
		}
	}

	public function tambah_status($id_proyek)
	{
		if($this->session->userdata('login_iman') != true){
				$data = array(
					'content'=>'login_dulu.php',
					'judul'=>'Harap Login Terlebih Dahulu',
				);
				$this->load->view('index_all', $data);
		}else{
				$id_user = $this->session->userdata()['user_id_iman'];
				$nama_user = $this->session->userdata()['nama_iman'];
				$result = $this->task_model->create_status(array(
					"status_name" => $_POST["nama_status"] ,
					"id_project" => $id_proyek,
					"id_state" => $_POST["id_state"]
				));

				if($result){
					$data_history = array(
						"history_name" => $nama_user." menambah status ".$_POST["nama_status"] ,
						"id_creator" => $id_user,
						"id_project" => $id_proyek,
					);
					$this->task_model->create_history($data_history);
				}

				redirect(base_url("index.php/task/proyek/".$id_proyek));
			}
	}

	public function hapus_task(){
		if($this->session->userdata('login_iman') != true){
				$data = array(
					'content'=>'login_dulu.php',
					'judul'=>'Harap Login Terlebih Dahulu',
				);
				$this->load->view('index_all', $data);
		}else{
			$this->task_model->remove_task($this->input->post('id_task_detail'));
			redirect(base_url("index.php/task/perproyek"));
		}
	}

	public function tambah_tugas($id_proyek)
	{

		$id_user = $this->session->userdata()['user_id_iman'];
		$nama_user = $this->session->userdata()['nama_iman'];
		// $petugas = $this->user_model->get_user_by_id($_POST["id_petugas"]);
		//print_r($petugas["nama"]);
		//die();
		// print_r($this->input->post());
		

		$result = $this->task_model->create_tugas(array(
			"title" => $_POST["title"] ,
			"description" => $_POST["description"],
			"id_creator" => $id_user,
			"id_petugas" => '',
			"id_status" => $_POST["id_status"],
			"start_date" => $_POST["start_date"],
			"end_date" => $_POST["end_date"],

		));

		// var_dump($result);
		// exit;
		$nama ='';
		foreach ($this->input->post('id_petugas') as $key => $value) {
			# code...
			$this->task_model->create_petugas(array('id_task_detail'=>$result,'id_user'=>$value));
			// print_r($value);
			$nama .= $this->user_model->get_user_by_id($value)['nama'].", ";
		}
		// print_r($nama);
		// exit;
		if($result){
			$data_history = array(
				"history_name" => $nama_user." membuat pekerjaan '".$_POST["title"] ."' yang ditugaskan kepada ". $nama  ,
				"id_creator" => $id_user,
				"id_project" => $id_proyek,
				"id_task" => $_POST["id_status"]
			);
			$this->task_model->create_history($data_history);
		}

		redirect(base_url("index.php/task/proyek/".$id_proyek));
	}

}
