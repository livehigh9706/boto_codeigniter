<?php
/**
 * Created by PhpStorm.
 * User: qpqoq
 * Date: 2018-12-19
 * Time: 오후 1:59
 */
if ($this->session->flashdata('admin_fail')) {
    ?>
    <script>
        alert('<?=$this->session->flashdata('admin_fail')?>');
    </script>
    <?php
    $this->session->unmark_flash('admin_fail');
}
?>

<div class="section login">
    <div class="container">
        <div class="center">
            <h2>로그인</h2>
        </div>
        <form action="auth/login" method="post">
            <table>
                <tr>
                    <td class="input_td">
                        <label for="id">아이디</label>
                        <input type="text" id="id" name="id"/>
                    </td>
                    <td rowspan="2" class="submit_td">
                        <button type="submit">로그인</button>
                    </td>
                </tr>
                <tr>
                    <td class="input_td">
                        <label for="password">비밀번호</label>
                        <input type="password" id="password" name="password"/>
                    </td>
                </tr>
            </table>

        </form>
    </div>

</div>
