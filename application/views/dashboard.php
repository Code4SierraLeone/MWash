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
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Architects+Daughter|Roboto&subset=latin,devanagari'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">

    <style>
        body{
            background: #eee;
        }
    </style>


</head>
<body>

<header>

    <!-- Navbar goes here -->
    <nav class="nav-wrapper indigo darken-4">
        <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only"><i class="material-icons">menu</i></a></div>
        <div class="col s12">
            <ul class="right">
                <li class="right">
                    <a href="<?= base_url() ?>index.php/logout" target="_blank" class="fa fa-sign-out fa-2x waves-effect waves-light"><span class="icon-text"></span></a>
                </li>
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
                    <a href="#!name"><span class="white-text name">Jordan Capa</span></a>
                    <a href="#!email"><span class="white-text email">jcapas.cs@gmail.com</span></a>
                </div></li>
            <li>
                <a href="#!"><i class="material-icons">dashboard</i>Dashboard</a>
            </li>
        </ul>
    </div>

</header>

<main>
    <div class="container section">
        <div class="row">
            <div class="col s12 m6">
                <div class="card white">
                    <div class="card-content black-text">
                        <span class="card-title">Alert Subscribers</span>
                        <p id="countregusers" style="text-align: center;font-size: xx-large;">0</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card white">
                    <div class="card-content black-text">
                        <span class="card-title">Updates By Community</span>
                        <p id="countregusers" style="text-align: center;font-size: xx-large;">0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

</body>

<!--  Scripts-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>if (!window.jQuery) { document.write('<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"><\/script>'); }</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin/simplebar.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/custom.js"></script>



</html>