<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">

    <title>MWash | Dashboard</title>

    <link href="<?php echo base_url(); ?>assets/css/admin/materialize.css" type="text/css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">

    <link href="<?php echo base_url(); ?>assets/css/admin/simplebar.css" type="text/css" rel="stylesheet" media="screen">
</head>

<body class="loading">

<header>

    <div class="brand-logo hide-on-large-only"></div>
    <div class="navbar-fixed hide-on-large-only">
        <nav>
            <div class="nav-wrapper">
                <ul class="right">
                    <li class="hide-on-small-only"><a href="#search-in-modal" class="modal-trigger"><i class="material-icons">search</i></a></li>
                    <li class="hide-on-small-only"><a href="account.html"><i class="material-icons">perm_identity</i></a></li>
                    <li class="hide-on-small-only"><a href="login.html" target="_blank"><i class="material-icons">exit_to_app</i></a></li>
                    <li class="toogle-side-nav"><a href="#" data-activates="slide-menu" class="button-collapse"><i class="material-icons">menu</i></a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div id="slide-menu" class="side-nav fixed" data-simplebar-direction="vertical">
        <ul class="side-nav-main">
            <li class="logo hide-on-med-and-down"></li>
            <li class="side-nav-inline hide-on-med-only"> <a href="login.html" class="inline waves-effect" target="_blank"><i class="material-icons">exit_to_app</i></a> <a href="account.html" class="inline waves-effect"><i class="material-icons">perm_identity</i></a> </li>
            <li><a href="#" class="waves-effect"><span>Dashboard</span></a></li>
        </ul>
    </div>

    <div id="search-in-modal" class="modal">
        <div class="modal-content">
            <nav class="flat">
                <div class="nav-wrapper">
                    <form>
                        <div class="input-field">
                            <input id="search" type="search" class="secondary-color-text white" style="margin:0;" required>
                            <label for="search"><i class="material-icons secondary-color-text">search</i></label>
                            <i class="material-icons modal-action modal-close">close</i> </div>
                    </form>
                </div>
            </nav>
        </div>
        <div class="modal-footer"> <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Search now</a> </div>
    </div>

</header>

<main>

</main>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>if (!window.jQuery) { document.write('<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"><\/script>'); }</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin/simplebar.min.js"></script>
<!--materialize js-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>

</body>
</html>