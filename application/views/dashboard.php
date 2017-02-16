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
<body site_url="<?= base_url() ?>">

<header>

    <!-- Navbar goes here -->
    <nav class="nav-wrapper indigo darken-4">
        <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only"><i class="material-icons">menu</i></a></div>
        <div class="col s12">
            <ul class="right">
                <li class="right">
                    <a href="<?= base_url() ?>index.php/logout" class="fa fa-sign-out fa-2x waves-effect waves-light"><span class="icon-text"></span></a>
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
                    <a href="#!name"><span class="white-text name"><?= ucfirst($username); ?></span></a>
                    <a href="#!email"><span class="white-text email"></span></a>
                </div></li>
            <li>
                <a style="cursor: pointer;" id="dash_menu"><i class="material-icons">dashboard</i>Dashboard</a>
            </li>
            <li>
                <a style="cursor: pointer;" id="add_wp_menu"><i class="material-icons">add_circle</i>Add New Water Point</a>
            </li>
        </ul>
    </div>

</header>

<main>
    <div class="container section" id="dashboard">
        <div class="row">
            <div class="col s12 m6">
                <div class="card white">
                    <div class="card-content black-text">
                        <span class="card-title">MWash Subscribers</span>
                        <p id="alertscount" style="text-align: center;font-size: xx-large;"></p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card white">
                    <div class="card-content black-text">
                        <span class="card-title">Updates By Community</span>
                        <p id="comupdatescount" style="text-align: center;font-size: xx-large;">0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container section" id="addwp" style="display: none;">
        <div class="row">
            <form id="subcription-form" class="col s12">
                <input disabled name="newid" id="newid" type="hidden" class="validate">
                <div class="row">
                    <div class="input-field col s12">
                        <input name="nw_name" id="nw_name" type="text" class="validate">
                        <label for="nw_name">Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="nw_prov" id="nw_prov" type="text" class="validate">
                        <label for="nw_prov">Province Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="nw_dist" id="nw_dist" type="text" class="validate">
                        <label for="nw_dist">District Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="nw_chief" id="nw_chief" type="text" class="validate">
                        <label for="nw_chief">Chiefdom Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="nw_section" id="nw_section" type="text" class="validate">
                        <label for="nw_section">Section</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select name="nw_parts" id="nw_parts">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="More than 20 miles">More Than 20 Miles</option>
                            <option value="Within 20 mile">Within 20 Miles</option>
                            <option value="In this community">In This Community</option>
                        </select>
                        <label>Repair Parts Availability</label>
                    </div>
                    <div class="input-field col s6">
                        <select name="nw_mechanic" id="nw_mechanic">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="Unknown">Unknown</option>
                        </select>
                        <label>Water Point Mechanic</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select name="nw_money" id="nw_money">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="No- water is free">No - Water Is Free</option>
                            <option value="Only if there is a breakdown">Only If There Is A Breakdown</option>
                            <option value="No water">No Water</option>
                            <option value="Yes- regularly">Yes - Regularly</option>
                            <option value="Other">Other</option>
                        </select>
                        <label>Does The Community Pay For Water?</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="nw_age" id="nw_age" type="text" class="validate">
                        <label for="nw_age">Year Built or Constructed or Discovered?</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input name="nw_manager" id="nw_manager" type="text" class="validate">
                        <label for="nw_manager">Water Point Management</label>
                    </div>
                </div>
            </form>
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