<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('staff_model');
    }

    public function index($page_name = 'staff_list') {

        $data['staff_list'] = $this->staff_model->get_list();
        $this->load_view($page_name, $data);
    }

    public function load_view($page_name, $data = '') {
        $this->load->view('header');
        $this->load->view('left_menu');
        $this->load->view('company/' . $page_name, $data);
        $this->load->view('footer');
    }

    public function add_edit_staff($page_name, $staff_id = 0) {
        $data = array();
        if ($staff_id > 0) {
            $data['staff_list'] = $this->staff_model->get_list($staff_id);
        }
        //echo "<pre>";
        //print_r($data);

        $this->load_view($page_name, $data);
    }

    public function insert_update_staff() {
        $data = $this->input->post();

        $post_data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email_id' => $this->input->post('email_id'),
            'mobile_no' => $this->input->post('mobile_no'),
            'staff_id' => $this->input->post('staff_id'),
        );

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        // $config['max_size']="100";
        // $config['max_width']="1024";
        // $config['max_height']="768";

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
            $photo = $data['upload_data']['file_name'];
            $post_data['photo'] = $photo;
        }

        if ($this->input->post('staff_id') == '') {
            unset($post_data['staff_id']);
        }

        $res = $this->staff_model->insert_update_staff($post_data);
        if ($res == 1) {
            // echo "Record inserted successfully";
            $this->index();
        } else {
            echo "Error";
        }
    }

    public function delete_staff($staff_id) {
        $res = $this->staff_model->delete_staff($staff_id);
        if ($res == 1) {
            $this->index();
        } else {
            echo "Error";
        }
    }

}
