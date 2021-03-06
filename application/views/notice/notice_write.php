<?php
/**
 * Created by PhpStorm.
 * User: qpqoq
 * Date: 2018-12-19
 * Time: 오전 11:39
 */
?>


<div class="write section">
    <div class="container">
        <div class="center">
            <h2>글쓰기</h2>
        </div>
        <?php echo form_open('notice/'.(($mode == 'modify') ? $post->id.'/modify' : 'write'), array('class'=>'write_form', 'enctype'=>'multipart/form-data')); ?>
            <table>
                <tbody>
                <tr>
                    <th><label for="title">제목</label></th>
                    <td>
                        <input type="text" id="title" name="title" size="60"
                               value="<?= ($mode == 'modify') ? $post->title : '' ?>"/>
                        <?php echo form_error('title', '<span class="error"><i class="fas fa-exclamation-circle"></i> ', '</span>'); ?>
                    </td>
                </tr>
                <tr>
                    <th><label for="content">내용</label></th>
                    <td>
                        <textarea name="content" id="content"
                                  rows="15"><?= ($mode == 'modify') ? $post->content : '' ?></textarea>
                        <?php echo form_error('content', '<div class="error"><i class="fas fa-exclamation-circle"></i> ', '</div>'); ?>
                    </td>
                </tr>
                <tr>
                    <th>파일#1</th>
                    <td>
                        <input type="file" id="file1" name="files[]"/>
                        <?php if ($mode == 'modify' && $post->file1): ?>
                            <div class="uploaded_file">등록된 파일 : <?= $post->file1 ?></div>
                            <input type="checkbox" name="delfile[]" value="file1"> 삭제
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>파일#2</th>
                    <td>
                        <input type="file" id="file2" name="files[]"/>
                        <?php if ($mode == 'modify' && $post->file2): ?>
                            <div class="uploaded_file">등록된 파일 : <?= $post->file2 ?></div>
                            <input type="checkbox" name="delfile[]" value="file2"> 삭제
                        <?php endif; ?>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="2">
                        <button type="submit" class="btn btn-primary">작성완료</button>
                        <a href="javascript:;" class="btn btn-primary" onclick="history.back(-1);">취소</a>
                    </th>
                </tr>
                </tfoot>
            </table>
        </form>
    </div>

</div>