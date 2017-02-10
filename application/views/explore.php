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

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYHe93URHILf69tc1EtK7wuVd0rwKEOHw"></script>

    <script type="text/javascript">
        function initialize() {
            google.maps.visualRefresh = true;
            var isMobile = (navigator.userAgent.toLowerCase().indexOf('android') > -1) ||
                (navigator.userAgent.match(/(iPod|iPhone|iPad|BlackBerry|Windows Phone|iemobile)/));
            if (isMobile) {
                var viewport = document.querySelector("meta[name=viewport]");
                viewport.setAttribute('content', 'initial-scale=1.0, user-scalable=no');
            }

            var body = document.body,
                html = document.documentElement;

            var height = Math.max( body.scrollHeight, body.offsetHeight,
                html.clientHeight, html.scrollHeight, html.offsetHeight );

            var rheight = height - 64;

            var mapDiv = document.getElementById('googft-mapCanvas');
            mapDiv.style.width = isMobile ? '100%' : '100%';
            mapDiv.style.height = isMobile ? '100%' : rheight +'px';
            var map = new google.maps.Map(mapDiv, {
                center: new google.maps.LatLng(8.646785826402805, -11.696121582031306),
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                streetViewControl: false,
                zoomControl: true,
                zoomControlOptions: {
                    position: google.maps.ControlPosition.LEFT_TOP
                }
            });

            layer = new google.maps.FusionTablesLayer({
                map: map,
                heatmap: { enabled: false },
                query: {
                    select: "col50",
                    from: "1aHLU3Qqsl9X_W_BEvZaPn_dkNV8UtXtJPnKedgKB",
                    <?php if(isset($_REQUEST['pr']) && $_REQUEST['pr'] != ''){ $pr = $_REQUEST['pr']; ?>
                    where: "province = <?php echo "'".$pr."'"; ?>"
                    <?php }else{ ?>
                    where: ""
                    <?php } ?>

                },
                options: {
                    styleId: 2,
                    templateId: 2
                }
            });

            if (isMobile) {
                var legend = document.getElementById('googft-legend');
                var legendOpenButton = document.getElementById('googft-legend-open');
                var legendCloseButton = document.getElementById('googft-legend-close');
                legend.style.display = 'none';
                legendOpenButton.style.display = 'block';
                legendCloseButton.style.display = 'block';
                legendOpenButton.onclick = function() {
                    legend.style.display = 'block';
                    legendOpenButton.style.display = 'none';
                }
                legendCloseButton.onclick = function() {
                    legend.style.display = 'none';
                    legendOpenButton.style.display = 'block';
                }
            }
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

</head>
<body site-url="<?php echo base_url(); ?>">

<header>
    <nav class="nav-wrapper indigo darken-4">
        <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only"><i class="material-icons">menu</i></a></div>
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
    <ul id="nav-mobile" style="border: 0px !important;" class="side-nav fixed collapsible collapsible-accordion">
        <li>
            <div class="row">
                <div style="margin: 0px;" class="card">
                    <div class="card-image">
                        <?php if(isset($_REQUEST['pr'])){ $pr = $_REQUEST['pr']; ?>
                        <?php if($pr == ''){ ?>
                            <img src="<?php echo base_url(); ?>assets/img/sierraleone-c.jpg">
                            <span class="card-title">Sierra Leone</span>
                        <?php }else if($pr == 'Northern'){ ?>
                            <img src="<?php echo base_url(); ?>assets/img/northern-p.jpg">
                            <span class="card-title">Northern Province</span>
                        <?php }else if($pr == 'Southern'){ ?>
                            <img src="<?php echo base_url(); ?>assets/img/southern-p.jpg">
                            <span class="card-title">Southern Province</span>
                        <?php }else if($pr == 'Eastern'){ ?>
                            <img src="<?php echo base_url(); ?>assets/img/eastern-p.jpg">
                            <span class="card-title">Eastern Province</span>
                        <?php }else if($pr == 'Western'){ ?>
                            <img src="<?php echo base_url(); ?>assets/img/western-p.jpg">
                            <span class="card-title">Western Province</span>
                        <?php } }else{ ?>
                            <img src="<?php echo base_url(); ?>assets/img/sierraleone-c.jpg">
                            <span class="card-title">Sierra Leone</span>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </li>
        <li class="bold"><a class="collapsible-header  waves-effect waves-teal"><i class="material-icons">location_on</i>Province</a>
            <div class="collapsible-body" style="padding: 0px !important;">
                <ul>
                    <li id="allp"><a href="<?php echo base_url(); ?>index.php/explore">All Provinces</a></li>
                    <li id="nth"><a href="<?php echo base_url(); ?>index.php/explore?pr=Northern">Nothern</a></li>
                    <li id="sth"><a href="<?php echo base_url(); ?>index.php/explore?pr=Southern">Southern</a></li>
                    <li id="est"><a href="<?php echo base_url(); ?>index.php/explore?pr=Eastern">Eastern</a></li>
                    <li id="wst"><a href="<?php echo base_url(); ?>index.php/explore?pr=Western">Western</a></li>
                </ul>
            </div>
        </li>
    </ul>
</header>

<main>
    <div id="googft-mapCanvas"></div>
</main>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Water Point Update</h4>
        <p id="init_msg">Hi, you can take part in providing update about the condition of water points where you live. You will only be able to update only some few attributes. Select which attribute you want to update. Below</p>
        <div class="row">
            <form id="update-form" class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <select id="wpu" name="wpu">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="wsm">Water Source Mechanic</option>
                            <option value="mngr">Manager</option>
                            <option value="chw">Chlorinated Water</option>
                            <option value="wsq">Water Source Quality</option>
                        </select>
                    </div>
                </div>
                <div class="row" style="display: none;">
                    <div class="input-field col s12">
                        <input name="wp_id" id="wp_id" type="text" class="validate">
                        <label for="text">Provide WaterPoint ID</label>
                    </div>
                </div>
                <div class="row" style="display: none;">
                    <div class="input-field col s12">
                        <input name="wsm_update" id="wsm_update" type="text" class="validate">
                        <label for="text">Is the water source mechanic available?</label>
                    </div>
                </div>
                <div class="row" style="display: none;">
                    <div class="input-field col s12">
                        <input name="mngr_update" id="mngr_update" type="text" class="validate">
                        <label for="text">Who manages the water point?</label>
                    </div>
                </div>
                <div class="row" style="display: none;">
                    <div class="input-field col s12">
                        <input name="chw_update" id="chw_update" type="text" class="validate">
                        <label for="text">Is the water chlorinated?</label>
                    </div>
                </div>
                <div class="row" style="display: none;">
                    <div class="input-field col s12">
                        <input name="wsq_update" id="wsq_update" type="text" class="validate">
                        <label for="text">What is the quality of the Water Source?</label>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat left">Close</a>
        <a style="color: #ffffff !important;" class="waves-effect indigo lighten-1 waves-green btn-flat" id="submit-wpu">Submit</a>
    </div>
</div>

<div class="fixed-action-btn modal-trigger">
    <a class="btn-floating indigo btn-large" data-target="modal1" href="#modal1">
        <i class="large material-icons">mode_edit</i>
    </a>
</div>
<div style="position: absolute !important; left: 0px !important; top: 0px !important; padding-top: 4px !important; z-index: 999 !important;">
    <a style="background-color: #fff0 !important;" class="btn-floating indigo btn-large"  href="<?php echo base_url(); ?>">
        <i class="large material-icons">arrow_back</i>
    </a>
</div>

<div class="rowid hidden"></div>
<div class="wp_column_name hidden"></div>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>if (!window.jQuery) { document.write('<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"><\/script>'); }
</script>

<script src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

</body>
</html>
