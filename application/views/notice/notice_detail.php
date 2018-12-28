<?php
/**
 * Created by PhpStorm.
 * User: qpqoq
 * Date: 2018-12-19
 * Time: 오후 2:50
 */
?>

<div class="section notice_detail">
    <div class="container">
        <div class="center">
            <h2>공지사항</h2>
        </div>
        <table>
            <tbody>
            <tr>
                <th>제목</th>
                <td>
                    <?= $post->title ?>
                </td>
            </tr>
            <tr>
                <th>작성자</th>
                <td>
                    <?= $post->writer ?>
                </td>
            </tr>
            <tr>
                <th>작성일시</th>
                <td>
                    <?= $post->date ?>
                </td>
            </tr>
            <tr>
                <th>내용</th>
                <td class="detail_content">
                    <?= $post->content ?>
                </td>
            </tr>
            <tr>
                <th>파일#1</th>
                <td>
                    <a href="<?=base_url().$post->file1_path?>"><?=$post->file1?></a>
                </td>
            </tr>
            <tr>
                <th>파일#2</th>
                <td>
                    <a href="<?=base_url().$post->file2_path?>"><?=$post->file2?></a>
                </td>
            </tr>
            <tr>
                <th colspan="2" class="foot_menu">
                    <a href="<?=base_url()?>index.php/notice" class="btn btn-primary">목록</a>
                    <?php
                    if ($this->session->userdata('is_admin')) {
                        ?>
                        <a href="<?=$post->id?>/modify" class="btn btn-primary">수정</a>
                        <a href="<?=$post->id?>/delete" class="btn btn-primary">삭제</a>
                        <?php
                    }
                    ?>
                </th>
            </tr>
            </tbody>
        </table>
    </div>
</div>
