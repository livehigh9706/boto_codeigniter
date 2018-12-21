<?php

/**
 * Created by PhpStorm.
 * User: qpqoq
 * Date: 2018-12-19
 * Time: 오후 4:10
 */
class Qna_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->db->query('select * from qna order by id desc')->result();
    }

    public function getLatest()
    {
        return $this->db->query('select * from qna order by id desc limit 0, 5')->result();
    }

    public function getbyId($id)
    {
        $sql = ('select * from qna where id=?');
        return $this->db->query($sql, $id)->row();
    }

    public function add($data)
    {
        $this->db->set($data);
        $this->db->insert('qna');
    }

    public function modify($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('qna');
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('qna');
    }

    public function hit($id) {
        $this->db->set('hit', 'hit+1');
        $this->db->where('id', $id);
        $this->db->update('qna');
    }
}

?>

