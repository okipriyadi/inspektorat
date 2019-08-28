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
		$data = array('content'=>'task/perorang.php', 'judul'=>'Task Perorang');
		$this->load->view('index_all', $data);
	}

	public function semuaTugas()
	{
		$statusResult = $this->task_model->getAllStatus();
		$taskDetail = $this->task_model->getAllStatus();
		$data = array(
			'content'=>'task/semua_tugas.php',
			'judul'=>'Task Pertugas',
			'statusResult'=>$statusResult
		);
		$this->load->view('index_all', $data);
	}

	public function perproyek()
	{
			$data = array('content'=>'task/perproyek.php', 'judul'=>'Task Perproyek' );
			$this->load->view('index_all', $data);
	}

	public function proyek($id_project)
	{
			$proyek = $this->task_model->getProjectById($id_project);
			$status = $this->task_model->getSatatusByProjectId($id_project);
			$task = $this->task_model->getTaskByProject($id_project);
			$data = array(
				'content'=>'task/proyekById.php',
				'judul'=>$proyek["project_name"],
				'status'=> $status,
				'task' => $task
			);
			$this->load->view('index_all', $data);
	}

	public function updateTaskStatus($id_detail, $id_status)
	{
			$this->task_model->updateTaskStatus($id_detail, $id_status);
			return 1;

	}

}
