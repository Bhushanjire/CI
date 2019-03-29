<?php

class staff_model extends CI_Model {

    public function get_list($staff_id = 0) {
        if ($staff_id > 0) {
            $this->db->where('staff_id', $staff_id);
        }
        $this->db->select('*');
        $this->db->from('staff');
        $query = $this->db->get();

        //print_r($this->db->last_query());    

        return $query->result();
    }

    public function insert_update_staff($data) {
        if ($data['staff_id'] > 0) {
            $this->db->where('staff_id', $data['staff_id']);
            $res =$this->db->update('staff', $data);
        } else {
            $res = $this->db->insert('staff', $data);
        }
        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete_staff($staff_id) {
        $this->db->where('staff_id', $staff_id);
        $res = $this->db->delete('staff');
        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }

}
