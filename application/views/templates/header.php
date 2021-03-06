<?php
/**
 * Created by PhpStorm.
 * User: qpqoq
 * Date: 2018-12-18
 * Time: 오후 3:03
 */
$menu = $this->config->item('menu');
?>

<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/common.css">
    <!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
    <!--    <link rel="stylesheet" href="-->
    <? // echo base_url() ?><!--/plugin/froala/css/froala_editor.pkgd.min.css"/>-->
    <!--    <link rel="stylesheet" href="--><? // echo base_url() ?><!--/plugin/froala/css/froala_style.min.css"/>-->

    <script src="<? echo base_url() ?>/assets/js/jquery-3.3.1.min.js"></script>
    <script src="<? echo base_url() ?>/assets/js/bootstrap.min.js"></script>
    <script src="<? echo base_url() ?>/assets/js/common.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <script type="text/javascript"
            src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=bc91aailra"></script>
    <title>주식회사 보토</title>
</head>
<body>
<div class="header">
    <div class="container">
        <div class="top_menu">
            <span><a href="<? echo base_url() ?>index.php">HOME</a></span>
            <span>
                <?php if (!$this->session->userdata('is_admin')): ?>
                    <a href="<? echo base_url() ?>index.php/auth">ADMIN</a>
                <?php else: ?>
                    <a href="<? echo base_url() ?>index.php/auth/logout">LOGOUT</a>
                <?php endif; ?>
            </span>
        </div>
        <div class="menu_bar">
            <div class="logo">
                <h1><a href="<? echo base_url() ?>index.php">BOTO</a></h1>
            </div>
            <div class="menu">
                <ul>
                    <?php foreach ($menu as $menu_big => $menu_sub): ?>
                        <li><a href="#"><?=$menu_big?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <ul class="sub_wrap">
            <?php foreach ($menu as $menu_big => $menu_sub): ?>
                <li class="container center">
                <?php foreach ($menu_sub as $key => $value): ?>
                    <span><a href="<? echo base_url() ?>index.php/<?=$value?>"><?=$key?></a></span>
            <?php endforeach;
            endforeach; ?>
        </ul>
    </div>
</div>

