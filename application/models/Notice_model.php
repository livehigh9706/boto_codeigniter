<?php
/**
 * Created by PhpStorm.
 * User: qpqoq
 * Date: 2018-12-19
 * Time: 오후 1:35
 */

class Notice_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll() {
        return $this->db->query('select * from notice order by id desc')->result();
    }

    public function getLatest() {
        return $this->db->query('select * from notice order by id desc limit 0, 5')->result();
    }

    public function getbyId($id) {
        $sql = 'select * from notice where id=?';
        return $this->db->query($sql, $id)->row();
    }

    public function add($data) {
        $this->db->set($data);
        $this->db->insert('notice');
    }

    public function modify($data, $id) {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('notice');
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('notice');
    }

    public function hit($id) {
        $this->db->set('hit', 'hit+1');
        $this->db->where('id', $id);
        $this->db->update('notice');
    }
}