<?php
/**
 * Created by PhpStorm.
 * User: qpqoq
 * Date: 2018-12-19
 * Time: 오후 4:09
 */

class Qna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Qna_model', 'Comment_model'));
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['qna'] = $this->Qna_model->getAll();
        $this->load->view('templates/header');
        $this->load->view('qna/qna', $data);
        $this->load->view('templates/footer');
    }

    public function view($id)
    {
        $data['post'] = $this->Qna_model->getbyId($id);
        $data['comments'] = $this->Comment_model->getByPost($id);
        $this->load->view('templates/header');
        $this->load->view('qna/qna_detail', $data);
        $this->load->view('templates/footer');
        $this->Qna_model->hit($id);
    }

    public function auth($id)
    {
        $target = $this->Qna_model->getbyId($id);
        if ($this->session->userdata('is_admin')) {
            $this->view($id);
        } else {
            if ($_POST) {
                if($this->input->post('password') == $target->password)
                {
                    $this->view($id);
                }
                else {
                    $this->session->set_flashdata('message', '비밀번호가 틀렸습니다.');
                    redirect('qna');
                }
            } else {
                $this->load->view('templates/header');
                $this->load->view('qna/qna_auth');
                $this->load->view('templates/footer');
            }
        }
    }

    public function write()
    {
        $this->form_validation->set_message('required', '{field}을(를) 입력하여주십시오.');

        if ($this->form_validation->run('qna') == true) {
            $this->Qna_model->add(array(
                'writer' => $this->input->post('writer'),
                'password' => $this->input->post('password'),
                'title' => $this->input->post('title'),
                'content' => nl2br($this->input->post('content')),
                'email' => $this->input->post('email'),
                'tel' => $this->input->post('tel'),
            ));
            redirect('qna');
        } else {
            $data['mode'] = 'write';
            $this->load->view('templates/header');
            $this->load->view('qna/qna_write', $data);
            $this->load->view('templates/footer');
        }
    }

    public function comment()
    {
        if ($this->input->post('mode') == 'write') {
            $this->Comment_model->add(array(
                'post' => $this->input->post('post_id'),
                'writer' => $this->input->post('writer'),
                'content' => $this->input->post('content')
            ));
            echo 'success';
        } else {
            $this->Comment_model->delete($this->input->post('id'));
            echo 'success';
        }
    }

    public function modify($id)
    {
        if ($_POST) {
            $this->Qna_model->modify(array(
                'writer' => $this->input->post('writer'),
                'password' => $this->input->post('password'),
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'email' => $this->input->post('email'),
                'tel' => $this->input->post('tel'),
            ), $id);

            redirect('qna/'.$id);
        } else {
            $data['mode'] = 'modify';
            $data['post'] = $this->Qna_model->getbyId($id);

            $this->load->view('templates/header');
            $this->load->view('qna/qna_write', $data);
            $this->load->view('templates/footer');
        }
    }

    public function delete($id)
    {
        $this->Qna_model->delete($id);
        redirect('qna');
    }

}