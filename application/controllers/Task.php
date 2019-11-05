<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

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

	public function semuaTugas()
	{
		// $statusResult = $this->task_model->getAllStatus();
		// $tasks = $this->task_model->getAllTask();
		// $data = array(
		// 	'content'=>'task/semua_tugas.php',
		// 	'judul'=>'Task Pertugas',
		// 	'statusResult'=>$statusResult,
		// 	'tasks' => $tasks
		// );
		// $this->load->view('index_all', $data);
		$status = $this->task_model->getSatatusByProjectId(12);
		$task = $this->task_model->getAllTask();
		$history = $this->task_model->get_history(20);
		$users = $this->user_model->getAllUser();
		// echo "<pre>";
		// print_r($task);
		// echo "</pre>";
		// die();
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

	public function perproyek()
	{
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
			 	'judul'=>'Task Perproyek',
			 	'proyeks' => $proyeks,
				'histories' => $history,
				"hitungan_proyeks"=>$hitungan_proyeks
			);
			$this->load->view('index_all', $data);
	}

	public function proyek($id_project)
	{
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

	public function editlampiran($id){
		$task_detail = $this->task_model->getTaskByTaskId($id);
		$data = array(
			'content'=>'task/tambah_lampiran.php',
			'judul'=> "Tambah Lampiran"
		);
		$this->load->view('index_all', $data);
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

	public function tambah_status($id_proyek)
	{
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

	public function tambah_tugas($id_proyek)
	{
		$id_user = $this->session->userdata()['user_id_iman'];
		$nama_user = $this->session->userdata()['nama_iman'];
		$petugas = $this->user_model->get_user_by_id($_POST["id_petugas"]);
		//print_r($petugas["nama"]);
		//die();
		$result = $this->task_model->create_tugas(array(
			"title" => $_POST["title"] ,
			"description" => $_POST["description"],
			"id_creator" => $id_user,
			"id_petugas" => $_POST["id_petugas"],
			"id_status" => $_POST["id_status"],
			"start_date" => $_POST["start_date"],
			"end_date" => $_POST["end_date"],
		));

		if($result){
			$data_history = array(
				"history_name" => $nama_user." membuat pekerjaan '".$_POST["title"] ."' yang ditugaskan kepada ". $petugas["nama"]  ,
				"id_creator" => $id_user,
				"id_project" => $id_proyek,
				"id_task" => $_POST["id_status"]
			);
			$this->task_model->create_history($data_history);
		}

		redirect(base_url("index.php/task/proyek/".$id_proyek));
	}

}
