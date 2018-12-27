<?php
/**
 * Created by PhpStorm.
 * User: qpqoq
 * Date: 2018-12-20
 * Time: 오후 12:51
 */

$config = array(
    'qna' => array(
        array(
            'field' => 'writer',
            'label' => '이름',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => '비밀번호',
            'rules' => 'required'
        ),
        array(
            'field' => 'title',
            'label' => '제목',
            'rules' => 'required'
        ),
        array(
            'field' => 'content',
            'label' => '내용',
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => '이메일',
            'rules' => 'required'
        ),
        array(
            'field' => 'tel',
            'label' => '전화번호',
            'rules' => 'required'
        ),
    )
);