<?php
/**
 * Created by PhpStorm.
 * User: qpqoq
 * Date: 2018-12-19
 * Time: 오후 5:17
 */

?>

<div class="section way">
    <div class="container">
        <div class="center">
            <h2>찾아오시는 길</h2>
        </div>
        <h4><i class="fas fa-map-marker-alt"></i>주소 : 대구광역시 수성구 달구벌대로 528길 15 (만촌동) 수성대학교 본관 401호</h4>
        <h4>
            <i class="fas fa-phone"></i>TEL : 070-7014-3080
            <i class="fas fa-fax"></i>FAX : 053-749-7018
        </h4>
        <div id="map"></div>
        <script>
            var map = new naver.maps.Map('map', {
                center: new naver.maps.LatLng(35.852652, 128.648003),
                zoom: 12,
                zoomControl: true, //줌 컨트롤의 표시 여부
                zoomControlOptions: { //줌 컨트롤의 옵션
                    position: naver.maps.Position.TOP_RIGHT
                }
            });

            var marker = new naver.maps.Marker({
                position: new naver.maps.LatLng(35.852652, 128.648003),
                map: map
            });
        </script>

    </div>
</div>
