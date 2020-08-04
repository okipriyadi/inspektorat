<?php
class Content_model extends CI_Model{
    public function create_one($table, $content){
        $this->db->insert($table,$content);
        return $this->db->insert_id();
    }

    public function update($table, $id, $content){
        $this->db->update($table,$content,$id);
        return true;
    }

    public function getSlider(){
        $this->db->select('*');
        $this->db->order_by('id_sliders','desc');
        $query = $this->db->get('sliders');
        return $query->result();
    }

    public function getSchedule(){
        $this->db->select('*');
        $this->db->order_by('id_schedule','desc');
        $query = $this->db->get('schedule');
        return $query->result();
    }

    public function getNews(){
        $this->db->select('*');
        $this->db->order_by('id_news','desc');
        $query = $this->db->get('news');
        return $query->result();
    }
}