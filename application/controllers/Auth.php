<?php
/**
 * Created by PhpStorm.
 * User: qpqoq
 * Date: 2018-12-19
 * Time: 오후 1:54
 */

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $this->load->view('templates/header');
        $this->load->view('login');
        $this->load->view('templates/footer');
    }

    public function login() {
        $admin = $this->config->item('admin');
        if($admin['id'] == $this->input->post('id') &&
            $admin['password'] == $this->input->post('password'))
        {
            $this->session->set_userdata('is_admin', 'y');
            $this->session->set_flashdata('admin_success', '관리자님 환영합니다.');
            redirect('/');
        }
        else
        {
            $this->session->set_flashdata('admin_fail', '로그인에 실패하였습니다.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect($_SERVER['HTTP_REFERER']);
    }
}


?>