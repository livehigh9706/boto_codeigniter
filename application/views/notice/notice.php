<?php
/**
 * Created by PhpStorm.
 * User: qpqoq
 * Date: 2018-12-19
 * Time: 오전 10:54
 */

?>

<div class="notice section">
    <div class="container">
        <div class="center">
            <h2>공지사항</h2>
        </div>
        <table border="1">
            <colgroup>
                <col width="50">
                <col>
                <col width="100">
                <col width="80">
                <col width="80">
            </colgroup>
            <thead>
            <tr>
                <th>No</th>
                <th>제목</th>
                <th>글쓴이</th>
                <th>날짜</th>
                <th>조회</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($notice as $post) : ?>
                <tr>
                    <th><?=$post->id?></th>
                    <td>
                        <a href="notice/<?=$post->id?>"><?=$post->title?></a>
                    </td>
                    <th><?=$post->writer?></th>
                    <th><?= date("m/d", strtotime($post->date))?></th>
                    <th><?=$post->hit?></th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php
        if ($this->session->userdata('is_admin')): ?>
            <a class="btn btn-primary pull-right" href="notice/write">글쓰기</a>
        <?php endif; ?>
    </div>
</div>