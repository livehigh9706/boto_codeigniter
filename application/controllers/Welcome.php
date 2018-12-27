<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Notice_model', 'Qna_model'));
    }

	public function index()
	{
	    $data['notice_lt'] = $this->Notice_model->getLatest();
        $data['qna_lt'] = $this->Qna_model->getLatest();

	    $this->load->view('templates/header');
		$this->load->view('welcome', $data);
        $this->load->view('templates/footer');
	}
}
