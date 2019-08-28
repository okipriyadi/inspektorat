<?php
class Task_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function getAllStatus(){
        $this->db->select('*');
        $query = $this->db->get_where('task_status',array());
		    return $query->result_array();
    }

    public function getProjectById($id_project){
      $this->db->select('*');
      $query = $this->db->get_where("task_project", array('id_project'=>$id_project));
      return $query->row_array();
    }

    public function getSatatusByProjectId($id_project){
      $this->db->select('*');
      $this->db->join('task_project', 'task_project.id_project = task_status.id_project','left');
      $query = $this->db->get_where("task_status", array('task_status.id_project'=>$id_project));
      return $query->result_array();
    }


    public function getTaskByProject($id_project){
      $this->db->select('*');
      $this->db->join('task_status', 'task_detail.id_status = task_status.id_status','left');
      $this->db->join('task_project', 'task_project.id_project = task_status.id_project','left');
      $this->db->order_by("task_status.id_status"); //order ini tidak boleh berubah karena digunakan sepaket dengan view agar tersusun dengan benar
      $query = $this->db->get_where("task_detail", array('task_status.id_project'=>$id_project));
      return $query->result_array();
    }

    public function updateTaskStatus($id_detail, $id_status){
      $this->db->update("task_detail",array("id_status"=>$id_status), array("id_detail" =>$id_detail));
      return 1;
    }

    public function getProjectTaskByStatus($status_id){
      $this->db->select('*');
      $query = $this->db->get_where("task_detail", array('status_id'=>$status_id));
      return $query->result_array();
    }


    public function getAllStatusOrderState(){
        $this->db->select('*');
        $this->db->join('task_status', 'task_detail.id_status = task_status.id_status','left');
        $this->db->join('task_project', 'task_project.id_project = task_status.id_project','left');
        $this->db->join('task_state', 'task_state.id_state = task_status.id_state','left');
        $this->db->order_by("task_status.id_state");
        $this->db->order_by("task_detail.id_status");
        $query = $this->db->get_where('task_detail',array());
		    return $query->result_array();
    }




    public function get_pilihan($id_pilihan){
      $this->db->select('*');
      $query = $this->db->get_where('pilihan',array('id_pilihan'=>$id_pilihan));
      return $query->row_array();
    }

    public function get_pilihans_by_id_pertanyaan($id_pertanyaan){
      $this->db->select('*');
      $query = $this->db->
      order_by('id_pilihan ASC')->
      get_where('pilihan',array('id_pertanyaan'=>$id_pertanyaan));

      return $query->result_array();
    }

    public function update_pilihan($id_pilihan, $nilai){
        $this->db->update("pilihan",array("skor"=>$nilai), array("id_pilihan" =>$id_pilihan));
        return 1;
    }
}
?>
