<?php
class Bahan_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    public function get($cond = null){
        $this->db->select('*');
        foreach ($cond as $key => $value) {
            # code...
            $this->db->where($key,$value);
        }
        $query = $this->db->get('bahan');
        return $query->result();
    }
}