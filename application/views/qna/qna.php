<?php
/**
 * Created by PhpStorm.
 * User: qpqoq
 * Date: 2018-12-19
 * Time: 오전 10:54
 */
if ($this->session->flashdata('message')) {
    ?>
    <script>
        alert('<?=$this->session->flashdata('message')?>');
    </script>
    <?php
    $this->session->unmark_flash('message');
}
?>

<div class="notice section">
    <div class="container">
        <div class="center">
            <h2>온라인문의</h2>
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
            <?php
            foreach ($qna as $post) {
                ?>
                <tr>
                    <th><?= $post->id ?></th>
                    <td>
                        <a href="qna/auth/<?= $post->id ?>"><?= $post->title ?></a> <i class="fas fa-lock"></i>
                    </td>
                    <th><?= $post->writer ?></th>
                    <th><?= date("m/d", strtotime($post->date)) ?></th>
                    <th><?= $post->hit ?></th>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <a class="btn btn-primary pull-right" href="qna/write">글쓰기</a>


    </div>

</div>