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
            <h2>문의글작성</h2>
        </div>
        <?php echo form_open('qna/'.(($mode == 'modify') ? $post->id.'/modify' : 'write'), array('class'=>'write_form')); ?>
            <table>
                <tbody>
                <tr>
                    <th><label for="writer">이름</label></th>
                    <td>
                        <input type="text" id="writer" name="writer"
                               value="<?= ($mode == 'modify') ? $post->writer : set_value('writer') ?>"/>
                        <?php echo form_error('writer', '<span class="error"><i class="fas fa-exclamation-circle"></i> ', '</span>'); ?>
                    </td>
                </tr>
                <tr>
                    <th><label for="password">비밀번호</label></th>
                    <td>
                        <input type="password" id="password" name="password"
                               value="<?= ($mode == 'modify') ? $post->password : set_value('password') ?>"/>
                        <?php echo form_error('password', '<span class="error"><i class="fas fa-exclamation-circle"></i> ', '</span>'); ?>
                    </td>
                </tr>
                <tr>
                    <th><label for="email">이메일</label></th>
                    <td>
                        <input type="text" id="email" name="email"
                               value="<?= ($mode == 'modify') ? $post->email : set_value('email') ?>"/>
                        <?php echo form_error('email', '<span class="error"><i class="fas fa-exclamation-circle"></i> ', '</span>'); ?>
                    </td>
                </tr>
                <tr>
                    <th><label for="tel">전화번호</label></th>
                    <td>
                        <input type="text" id="tel" name="tel"
                               value="<?= ($mode == 'modify') ? $post->tel : set_value('tel') ?>"/>
                        <?php echo form_error('tel', '<span class="error"><i class="fas fa-exclamation-circle"></i> ', '</span>'); ?>
                    </td>
                </tr>
                <tr>
                    <th><label for="title">제목</label></th>
                    <td>
                        <input type="text" id="title" name="title" size="60"
                               value="<?= ($mode == 'modify') ? $post->title : set_value('title') ?>"/>
                        <?php echo form_error('title', '<span class="error"><i class="fas fa-exclamation-circle"></i> ', '</span>'); ?>
                    </td>
                </tr>
                <tr>
                    <th><label for="content">내용</label></th>
                    <td>
                        <textarea name="content" id="content"
                                  rows="15"><?= ($mode == 'modify') ? $post->content : set_value('content') ?></textarea>
                        <?php echo form_error('content', '<div class="error"><i class="fas fa-exclamation-circle"></i> ', '</div>'); ?>
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