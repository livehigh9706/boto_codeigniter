<?php
/**
 * Created by PhpStorm.
 * User: qpqoq
 * Date: 2018-12-19
 * Time: 오전 10:54
 */

class Notice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Notice_model');
        $this->load->helper('form');
    }

    public function index()
    {
        $data['notice'] = $this->Notice_model->getAll();
        $this->load->view('templates/header');
        $this->load->view('notice/notice', $data);
        $this->load->view('templates/footer');
    }

    public function view($id)
    {
        $data['post'] = $this->Notice_model->getbyId($id);
        $this->Notice_model->hit($id);
        $this->load->view('templates/header');
        $this->load->view('notice/notice_detail', $data);
        $this->load->view('templates/footer');
    }

    public function write()
    {
        if ($_POST) {
            $files = array();
            if ($_FILES) {
                $files = $this->_uploadFile($_FILES['files']);
            }
            $this->Notice_model->add(array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'writer' => '관리자',
                'file1' => $files[0][0],
                'file2' => $files[0][1],
                'file1_path' => $files[1][0],
                'file2_path' => $files[1][1]
            ));
            redirect('notice');
        } else {
            $data['mode'] = 'write';
            $this->load->view('templates/header');
            $this->load->view('notice/notice_write', $data);
            $this->load->view('templates/footer');
        }
    }

    public function modify($id)
    {
        if ($_POST) {
            $this->Notice_model->modify(array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'writer' => '관리자',
            ), $id);

            redirect('notice/'.$id);
        } else {
            $data['mode'] = 'modify';
            $data['post'] = $this->Notice_model->getbyId($id);

            $this->load->view('templates/header');
            $this->load->view('notice/notice_write', $data);
            $this->load->view('templates/footer');
        }
    }

    public function delete($id)
    {
        $target = $this->Notice_model->getbyId($id);
        unlink($target->file1_path);
        unlink($target->file2_path);
        $this->Notice_model->delete($id);
        redirect('notice');
    }

    private function _uploadFile($files)
    {
        $path = 'uploads/file/';
        $count = count($files["name"]);
        $copied_file_name = array();
        $upfile_name = array();
        $uploaded_file = array();

        for ($i = 0; $i < $count; $i++) {
            $upfile_name[$i] = $files["name"][$i];
            $upfile_tmp_name[$i] = $files["tmp_name"][$i];
            $upfile_type[$i] = $files["type"][$i];
            $upfile_size[$i] = $files["size"][$i];
            $upfile_error[$i] = $files["error"][$i];

            if ($upfile_name[$i] == "")
                continue;

            $file = explode(".", $upfile_name[$i]);
            $file_name = $file[0];
            $file_ext = $file[1];

            if (!$upfile_error[$i]) {
                $new_file_name = date("Y_m_d_H_i_s");
                $new_file_name = $new_file_name . "_" . $i;
                $copied_file_name[$i] = $new_file_name . "." . $file_ext;
                $uploaded_file[$i] = $path . $copied_file_name[$i];


                if (!move_uploaded_file($upfile_tmp_name[$i], $uploaded_file[$i])) {
                    echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
                    exit;
                }
            }
        }
        return array($upfile_name, $uploaded_file);
    }
}