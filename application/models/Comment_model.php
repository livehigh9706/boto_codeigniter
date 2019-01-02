<?php
/**
 * Created by PhpStorm.
 * User: qpqoq
 * Date: 2018-12-20
 * Time: 오후 2:50
 */

class Comment_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function add($data) {
        $this->db->set($data);
        $this->db->insert('comment');
    }

    public function getByPost($post) {
        return $this->db->get_where('comment', array('post'=>$post))->result();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('comment');
    }
}