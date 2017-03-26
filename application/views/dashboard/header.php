<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Dashboard</title>

    <!-- CSS  -->
    <link rel='stylesheet prefetch' href='<?php echo base_url(); ?>assets/css/materialize.min.css'>
    <link rel='stylesheet prefetch' href='<?php echo base_url(); ?>assets/css/admin/custom.css'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Architects+Daughter|Roboto&subset=latin,devanagari'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>

    <?php if($page === 'newpoint'){ ?><script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYHe93URHILf69tc1EtK7wuVd0rwKEOHw"></script>

    <script type="text/javascript">
        function initialize() {
            var mapDiv = document.getElementById('mapCanvas');
            var map = new google.maps.Map(mapDiv, {
                zoom: 8,
                center: new google.maps.LatLng(8.646785826402805, -11.696121582031306),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var myMarker = new google.maps.Marker({
                position: new google.maps.LatLng(8.646785826402805, -11.696121582031306),
                draggable: true
            });

            google.maps.event.addListener(myMarker, 'dragend', function (evt) {
                document.getElementById('nw_lon').value = evt.latLng.lng().toFixed(7);
                document.getElementById('nw_lat').value = evt.latLng.lat().toFixed(7);
            });

//        google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
//            document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
//        });

            map.setCenter(myMarker.position);
            myMarker.setMap(map);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <?php } ?>

</head>
<body site_url="<?= base_url() ?>">

<header>

    <!-- Navbar goes here -->
    <nav class="nav-wrapper indigo darken-4">
        <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only"><i class="material-icons">menu</i></a></div>
        <div class="col s12">
            <ul class="right">
                <li class="right">
                    <a href="<?= base_url() ?>index.php/logout" class="modal-trigger fa fa-sign-out fa-2x waves-effect waves-light tooltipped" data-position="down" data-delay="1" data-tooltip="Logout"><span class="icon-text"></span></a>
                </li>
                <?php if($page === 'dash'): ?>
                <li class="right">
                    <a data-target="modal1" href="#modal1" class="modal-trigger fa fa-question-circle fa-2x waves-effect waves-light tooltipped" data-position="down" data-delay="1" data-tooltip="Quick Help"><span class="icon-text"></span></a>
                </li>
                <?php elseif ($page === 'newpoint'): ?>
                    <li class="right">
                        <a data-target="modal1" href="#modal1" class="modal-trigger fa fa-question-circle fa-2x waves-effect waves-light tooltipped" data-position="down" data-delay="1" data-tooltip="Quick Help"><span class="icon-text"></span></a>
                    </li>
                <?php elseif ($page === 'users'): ?>
                    <li class="right">
                        <a data-target="modal1" href="#modal1" class="modal-trigger fa fa-question-circle fa-2x waves-effect waves-light tooltipped" data-position="down" data-delay="1" data-tooltip="Quick Help"><span class="icon-text"></span></a>
                    </li>
                <?php else: ?>

                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="col s0 m2">
        <ul id="nav-mobile" style="border: 0px !important;" class="side-nav fixed collapsible collapsible-accordion">
            <li><div class="userView">
                    <div class="background">
                        <img src="<?php echo base_url(); ?>assets/img/office.jpg">
                    </div>
                    <a href="#!user"><img class="circle" src="<?php echo base_url(); ?>assets/img/avatar.jpg"></a>
                    <a href="#!name"><span class="white-text name"><?= ucfirst($username); ?></span></a>
                    <a href="#!email"><span class="white-text email"></span></a>
                </div></li>
            <li>
                <a href="<?= base_url() ?>index.php/dash"><i class="material-icons">dashboard</i>Dashboard</a>
            </li>
            <li>
                <a href="<?= base_url() ?>index.php/dash/newpoint"><i class="material-icons">add_circle</i>Add New Water Point</a>
            </li>
            <li>
                <a href="<?= base_url() ?>index.php/dash/users"><i class="material-icons">account_circle</i>Users</a>
            </li>
        </ul>
    </div>

</header>
