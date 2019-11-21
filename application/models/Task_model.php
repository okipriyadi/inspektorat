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

    public function getAllTask(){
        $this->db->select('*');
        $this->db->join('task_status', 'task_detail.id_status = task_status.id_status','left');
        $this->db->join('task_project', 'task_project.id_project = task_status.id_project','left');
        $this->db->join('user_task_detail', 'user_task_detail.id_task_detail = task_detail.id_detail','left');
        $this->db->order_by("task_status.id_state", "asc");
        $this->db->order_by("task_detail.last_update", "asc");
        $query = $this->db->get_where('task_detail',array());
		    return $query->result_array();
    }

    public function getAllTaskGroupByTask(){
        $this->db->select('*');
        $this->db->join('task_status', 'task_detail.id_status = task_status.id_status','left');
        $this->db->join('task_project', 'task_project.id_project = task_status.id_project','left');
        $this->db->order_by("task_status.id_state", "asc");
        $this->db->order_by("task_detail.last_update", "asc");
        $query = $this->db->get_where('task_detail',array());
        return $query->result_array();
    }




    public function getProjectById($id_project){
      $this->db->select('*');
      $query = $this->db->get_where("task_project", array('id_project'=>$id_project));
      return $query->row_array();
    }

    public function get_history($jumlah_proyek){
      $this->db->select('*');
      $this->db->order_by("date_creation", "desc");
      $this->db->join('task_project','task_project.id_project= task_history.id_project','left');
      $this->db->limit($jumlah_proyek, 0);
      $query = $this->db->get("task_history");
      return $query->result_array();
    }

    public function get_history_by_id_project($id_project){
      $this->db->select('*');
      $this->db->order_by("date_creation", "desc");
      $this->db->join('task_project','task_project.id_project= task_history.id_project','left');
      $this->db->limit(8, 0);
      $query = $this->db->get_where("task_history", array('task_history.id_project'=>$id_project));
      return $query->result_array();
    }

    public function getAllProject(){
      $this->db->select('*');
      $this->db->join('user','user.user_id= task_project.id_creator','left');
      $this->db->order_by("created_at", "desc");
      $query = $this->db->get("task_project");
      return $query->result_array();
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
      $this->db->join('user', 'task_detail.id_petugas = user.user_id','left');
      //$this->db->join('user_task_detail', 'user_task_detail.id_task_detail = task_detail.id_detail','left');
      $this->db->order_by("task_status.id_status"); //order ini tidak boleh berubah karena digunakan sepaket dengan view agar tersusun dengan benar
      $query = $this->db->get_where("task_detail", array('task_status.id_project'=>$id_project));
      return $query->result_array();
    }

    public function getStatusByStatusId($id_status){
      $this->db->select('*');
      $query = $this->db->get_where("task_status", array('id_status'=>$id_status));
      return $query->row_array();
    }

    public function getTaskByTaskId($id_task){
      $this->db->select('*');
      $this->db->join('task_status', 'task_detail.id_status = task_status.id_status','left');
      $this->db->join('task_project', 'task_project.id_project = task_status.id_project','left');
      $this->db->join('user', 'task_detail.id_petugas = user.user_id','left');
      $query = $this->db->get_where("task_detail", array('id_detail'=>$id_task));
      return $query->row_array();
    }

    public function getTaskState(){
      $this->db->select('*');
      $query = $this->db->get_where("task_state", array('id_state <='=>3));
      return $query->result_array();
    }

    public function updateTaskStatus($id_detail, $id_status){
      $this->db->update("task_detail",array("id_status"=>$id_status), array("id_detail" =>$id_detail));
      return 1;
    }
    public function updateTask($id_detail, $data){
      $this->db->update("task_detail",$data, array("id_detail" =>$id_detail));
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

    public function getUserTaskDetail($taskDetailId){
      $this->db->select('*');
      $this->db->join('user', 'user.user_id = user_task_detail.id_user');
      $query = $this->db->get_where('user_task_detail',array('id_task_detail'=>$taskDetailId));

      if($query->num_rows() > 0){
        return $query->result_array();
      }
      return false;
    }

    public function getLampiranTask($id){
      $this->db->select('*');
      $query = $this->db->get_where('task_lampiran',array('id_task_detail'=>$id));
      if($query->num_rows() > 0){
        return $query->result_array();
      }
      return false;
    }

    public function getLampiranLinkTask($id){
      $this->db->select('*');
      $query = $this->db->get_where('task_lampiran_link',array('id_task_detail'=>$id));
      if($query->num_rows() > 0){
        return $query->result_array();
      }
      return false;
    }

    public function getPetugasTask($id){
      $this->db->select('*');
      $this->db->join('user', 'user_task_detail.id_user = user.user_id','left');
      $query = $this->db->get_where("user_task_detail", array('id_task_detail'=>$id));
      if($query->num_rows() > 0){
        return $query->result_array();
      }
      return false;
    }

    public function count_status_by_state($id_state, $id_project){
      $this->db->select('count("id_detail") as jml ');
      $this->db->join('task_status', 'task_detail.id_status = task_status.id_status','left');
      $query = $this->db->get_where('task_detail',array("task_status.id_state"=>$id_state,"task_status.id_project"=>$id_project));
      return $query->row_array();
    }

    public function count_status_by_user($id_state, $user_id){
      $this->db->select('count("id_detail") as jml ');
      $this->db->join('task_status', 'task_detail.id_status = task_status.id_status','left');
      $this->db->join('user_task_detail', 'user_task_detail.id_task_detail = task_detail.id_detail','left');
      $query = $this->db->get_where('task_detail',array("task_status.id_state"=>$id_state,"user_task_detail.id_user"=>$user_id));
      return $query->row_array();
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

    public function create_proyek($data){
        $this->db->insert("task_project",$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function create_tugas($data){
        $this->db->insert("task_detail",$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function create_history($data_history){
        $this->db->insert("task_history",$data_history);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function create_status($data){
        $this->db->insert("task_status",$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function create_lampiran($data){
      $ins = $this->db->insert("task_lampiran",$data);
      if($ins){
        $insert_id = $this->db->insert_id();
        return $insert_id;
      }
      return NULL;
    }

    public function create_lampiran_link($data){
      $ins = $this->db->insert("task_lampiran_link",$data);
      if($ins){
        $insert_id = $this->db->insert_id();
        return $insert_id;
      }
      return NULL;
    }
    public function create_petugas($data){
      $ins = $this->db->insert("user_task_detail",$data);
      if($ins){
        $insert_id = $this->db->insert_id();
        return $insert_id;
      }
      return NULL;
    }
    public function remove_lampiran_link($id_data){
      $del = $this->db->delete('task_lampiran_link', array('id_task_lampiran_link' => $id_data));
      if($del){
        return true;
      }
      return NULL;
    }
    public function remove_lampiran($id_data){
      $del = $this->db->delete('task_lampiran', array('id_task_lampiran' => $id_data));
      if($del){
        return true;
      }
      return NULL;
    }
    public function remove_task($id_data){
      $del = $this->db->delete('task_detail', array('id_detail' => $id_data));
      if($del){
        return true;
      }
      return NULL;
    }
    public function remove_petugasbyIdTask($id_data){
      $del = $this->db->delete('user_task_detail', array('id_task_detail' => $id_data));
      if($del){
        return true;
      }
      return NULL;
    }
}
?>
