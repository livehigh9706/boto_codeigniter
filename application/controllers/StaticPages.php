<?php
/**
 * Created by PhpStorm.
 * User: qpqoq
 * Date: 2018-12-19
 * Time: 오후 5:22
 */

class StaticPages extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $path = $this->uri->segment(1);
        $this->load->view('templates/header');
        $this->load->view('statics/'.$path);
        $this->load->view('templates/footer');
    }
}