<?php
class Skp_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function getAllSasaranKegiatan(){
        $this->db->select('*');
        $query = $this->db->get_where('task_sasaran_kegiatan',array());
        return $query->result_array();
    }

    public function getSasaranKegiatanById($idSasaranKegiatan){
        $this->db->select('*');
        $query = $this->db->get_where('task_sasaran_kegiatan',array("id_sasaran_kegiatan"=>$idSasaranKegiatan));
        return $query->result_array();
    }

    public function getSasaranKegiatanByParentId($idParent){
        $this->db->select('*');
        $query = $this->db->get_where('task_sasaran_kegiatan',array("id_parent"=>$idParent));
        return $query->result_array();
    }

    public function getAllIndikatorKinerja(){
        $this->db->select('*');
        $query = $this->db->get_where('task_indikator_kinerja',array());
        return $query->result_array();
    }

    public function getAllIndikatorKinerjaByIdSasaran($idSasaranKegiatan){
        $this->db->select('*');
        $query = $this->db->get_where('task_indikator_kinerja',array("id_sasaran_kegiatan"=>$idSasaranKegiatan));
        return $query->result_array();
    }

    public function create_sasaran_kegiatan($data){
      $ins = $this->db->insert("task_sasaran_kegiatan",$data);
      if($ins){
        $insert_id = $this->db->insert_id();
        return $insert_id;
      }
      return NULL;
    }

    public function create_indikator_kinerja($data){
      $ins = $this->db->insert("task_indikator_kinerja",$data);
      if($ins){
        $insert_id = $this->db->insert_id();
        return $insert_id;
      }
      return NULL;
    }

    public function update($id,$data){
        if($this->db->update("task_indikator_kinerja", $data, "id_indikator_kinerja =".$id)){
            return true;
        }else{
            return false;
        }
    }
}
?>
