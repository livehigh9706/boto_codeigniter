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
            <h2>온라인문의</h2>
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
                <th>이메일</th>
                <td>
                    <?= $post->email ?>
                </td>
            </tr>
            <tr>
                <th>전화번호</th>
                <td>
                    <?= $post->tel ?>
                </td>
            </tr>
            <tr>
                <th>내용</th>
                <td class="detail_content">
                    <?= $post->content ?>
                </td>
            </tr>
            <tr>
                <th colspan="2" class="foot_menu">
                    <a href="<?= base_url() ?>index.php/qna" class="btn btn-primary">목록</a>
                    <a href="<?= $post->id ?>/modify" class="btn btn-primary">수정</a>
                    <a href="<?= $post->id ?>/delete" class="btn btn-primary">삭제</a>
                </th>
            </tr>
            </tbody>
            <tfoot class="comment_section">
            <tr>
                <th colspan="2">댓글</th>
            </tr>
            <tr>
                <td class="comment_form" colspan="2">
                    <textarea></textarea>
                    <button class="pull-right btn btn-primary"
                            onclick="write_comment('<?= $this->session->userdata("is_admin") ? "관리자" : $post->writer ?>', '<?= $post->id ?>');">
                        댓글작성
                    </button>
                </td>
            </tr>
            <?php foreach ($comments as $comment): ?>
                <tr class="comment">
                    <td colspan="2">
                        <div class="comment_head">
                            <h5 class="comment_writer"><?= $comment->writer ?></h5>
                            <span class="comment_date"><?= $comment->date ?></span>
                            <?php if ($this->session->userdata('is_admin')): ?>
                                <a class="pull-right" href="javascript:;"
                                   onclick="delete_comment('<?= $comment->id ?>')">삭제</a>
                            <?php endif; ?>
                        </div>
                        <div class="comment_content"><?= $comment->content ?></div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tfoot>
        </table>
    </div>
</div>
