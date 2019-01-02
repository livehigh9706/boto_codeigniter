<?php
/**
 * Created by PhpStorm.
 * User: qpqoq
 * Date: 2018-12-18
 * Time: 오후 3:02
 */
if ($this->session->flashdata('admin_success')) {
    ?>
    <script>
        alert('<?=$this->session->flashdata('admin_success')?>');
    </script>
    <?php
    $this->session->unmark_flash('admin_success');
}
?>

<div class="welcome_section">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?= base_url() ?>/assets/img/slide1.jpg" alt="">
            </div>
            <div class="item">
                <img src="<?= base_url() ?>/assets/img/slide2.jpg" alt="">
            </div>
            <div class="item">
                <img src="<?= base_url() ?>/assets/img/slide3.jpg" alt="">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 lt">
                <div class="lt_title">
                    공지사항
                    <span class="detail">
                    <a href="<? echo base_url() ?>index.php/notice">+</a>
                </div>
                <div class="lt_body">
                    <ul>
                        <?php
                        foreach ($notice_lt as $notice) {
                            ?>
                            <a href="<?=base_url()?>index.php/notice/<?=$notice->id?>">
                                <li>
                                    <?= $notice->title ?>
                                    <span class="pull-right"><?= date("m/d", strtotime($notice->date)) ?></span>
                                </li>
                            </a>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 lt">
                <div class="lt_title">
                    Q&A
                    <span class="detail">
                    <a href="<? echo base_url() ?>index.php/qna">+</a>
                </span>
                </div>
                <div class="lt_body">
                    <ul>
                        <?php
                        foreach ($qna_lt as $qna) {
                            ?>
                            <a href="<?=base_url()?>index.php/qna/<?=$qna->id?>">
                                <li>
                                    <?= $qna->title ?>
                                    <i class="fas fa-lock"></i>
                                    <span class="pull-right"><?= date("m/d", strtotime($qna->date)) ?></span>
                                </li>
                            </a>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 lt">
                <div class="lt_title">
                    오시는길
                    <span class="detail">
                    <a href="<? echo base_url() ?>index.php/way">+</a>
                </div>
                <div class="lt_body">
                    <div id="map"></div>

                    <script>
                        var map = new naver.maps.Map('map', {
                            center: new naver.maps.LatLng(35.852652, 128.648003),
                            zoom: 12
                        });

                        var marker = new naver.maps.Marker({
                            position: new naver.maps.LatLng(35.852652, 128.648003),
                            map: map
                        });
                    </script>
                </div>
            </div>
        </div>

    </div>

</div>


