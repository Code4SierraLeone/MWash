<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="">
    <title>MWash | Explore</title>

    <link rel='stylesheet prefetch' href='<?php echo base_url(); ?>assets/css/materialize.min.css'>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Architects+Daughter|Roboto&subset=latin,devanagari'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/explore-custom.css">

</head>
<body class="welcome">
<span id="splash-overlay" class="splash"></span>
<span id="welcome" class="z-depth-4"></span>

<header class="navbar-fixed">
    <nav class="row indigo darken-4">
        <div class="col s12">
            <ul class="right">
                <li class="right">
                    <a href="" target="_blank" class="fa fa-facebook-square fa-2x waves-effect waves-light"><span class="icon-text"></span></a>
                </li>
                <li class="right">
                    <a href="" target="_blank" class="fa fa-github-square fa-2x waves-effect waves-light"><span class="icon-text"></span></a>
                </li>
                <li class="right">
                    <a href="" target="_blank" class="fa fa-twitter-square fa-2x waves-effect waves-light"><span class="icon-text"></span></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main>

    <div class="container section" style="width: 85% !important;">
        <iframe id="main_iframe" width="100%" height="620" frameborder="0" src="https://13arturius91.carto.com/builder/4f131d46-d3d8-11e6-891f-0ee66e2c9693/embed" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
    </div>


</main>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <div class="row">
            <form id="update-form" class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input name="waterpoint_id" id="wp_id" type="text" class="validate">
                        <label for="text">Provide WaterPoint ID</label>
                    </div>
                </div>

            </form>
        </div>

    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>

<div class="fixed-action-btn modal-trigger">
    <a class="btn-floating indigo btn-large red" data-target="modal1" href="#modal1">
        <i class="large material-icons">mode_edit</i>
    </a>
</div>
<!--<div class="fixed-action-btn" style="top: 23px !important; left: 23px !important;">-->
<!--    <a class="btn-floating indigo btn-large red" href="--><?php //echo base_url(); ?><!--index.php">-->
<!--        <i class="large material-icons">arrow_back</i>-->
<!--    </a>-->
<!--</div>-->

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>if (!window.jQuery) { document.write('<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"><\/script>'); }
</script>

<script src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

</body>
</html>
