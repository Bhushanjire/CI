<?php

class Login_model extends CI_Model {

    public function check_login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->select('staff_id,first_name,last_name,photo');
        $this->db->from('staff');
        $query = $this->db->get();
        return $query->row();
    }

}
