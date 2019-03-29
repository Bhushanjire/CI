<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {

        if ($this->session->logged_in) {
            redirect('home');
        } else {
            $this->load->view('login');
        }
    }

    public function check_login_details() {
        $this->form_validation->set_rules('username', 'User Name', 'required', array('required' => 'Please Enter User Name'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Please Enter Password'));

        $this->form_validation->set_message('username', 'Please enter username');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $this->load->model('login_model');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $res = $this->login_model->check_login($username, $password);
            if (!empty($res)) {
                $sessionData = array(
                    'staff_id' => $res->staff_id,
                    'first_name' => $res->first_name,
                    'last_name' => $res->last_name,
                    'photo' => $res->photo,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($sessionData);
                redirect('home');
            } else {
                $errorMsg['msg'] = "Failed";
                $this->load->view('login', $errorMsg);
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}
