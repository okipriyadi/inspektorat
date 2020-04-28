<?php
class User_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function login($username, $password){

        $query = $this->db->get_where('user',array('username'=>$username,'password'=>md5 ( crypt ( $password, md5 ( $username ) ) )));
        //$query = $this->db->get_where('user',array('username'=>$username));
		return $query;
    }


    public function getAllUser(){
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function get_user_by_role($role){
        $this->db->select('*');
        $query = $this->db->get_where('user',array('role'=>$role));
        return $query->result_array();
    }

    public function getUserTask(){
        $this->db->select('*');
        $this->db->join('user_task_detail','user.user_id = user_task_detail.id_user');
        $query = $this->db->get('user');
        if($query->num_rows() < 1){
            return [];
        }
        return $query->result_array();
    }

    public function getUserEmail($username){
        $login = false;
        $query = $this->db->get_where('user',array('email'=>$this->input->post('username')));
        if($query->num_rows() > 0){
            $login=true;
        }else{
            $query = $this->db->get_where('user',array('username'=>$this->input->post('username')));
            if($query->num_rows() > 0){
                $login=true;
            }
        }
        if($login){
            return $query;
        }
    }



    public function get_user_by_id($user_id){
        $this->db->select('*');
        $query = $this->db->get_where('user',array('user_id'=>$user_id));
		return $query->row_array();
    }

    public function ldap_login(){
        $username = $this->input->POST('username');
        // return $username;
        if (strpos($username, '@menpan.go.id') !== false) {
            $explode = explode('@', $username);
            $user = $explode[0];
        }else{
            $user = $this->input->POST('username');
        }
        //echo $user; die();
        //$user = $this->input->POST('username');
        $pass = $this->input->POST('passwd');
        //echo $user." ".$pass; die();
        $ds=ldap_connect("mail.menpan.go.id")
            or die("Could not connect to LDAP server."); // must be a valid LDAP server!
            ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
            // echo "<br>Connect result is " . $ds . "<br />";
        if ($ds) {
            // echo "<br>Binding ...".$user;
            $ldaprdn  = 'uid='.$user.',ou=people,dc=menpan,dc=go,dc=id';     // ldap rdn or dn
            //$ldappass = 'password';  // associated password
            // this is an "anonymous" bind, typically
                if ($ldapbind = @ldap_bind($ds, $ldaprdn, $pass)) {
                    // echo "<br>LDAP bind successful...";
                    //echo "<br>Closing connection";
                    ldap_close($ds);
                    return true;
                } else {
                    // echo "<br>Wrong password";
                    //echo "<br>LDAP bind failed...";
                    //echo "<br>Closing connection";
                    ldap_close($ds);
                    //redirect('login/failed');
                    return false;
                }
        } else {
            return "failed";
        }
    }
}
