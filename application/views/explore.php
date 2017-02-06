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

            var mapDiv = document.getElementById('googft-mapCanvas');
            mapDiv.style.width = isMobile ? '100%' : '100%';
            mapDiv.style.height = isMobile ? '100%' : height +'px';
            var map = new google.maps.Map(mapDiv, {
                center: new google.maps.LatLng(8.646785826402805, -11.696121582031306),
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            layer = new google.maps.FusionTablesLayer({
                map: map,
                heatmap: { enabled: false },
                query: {
                    select: "col50",
                    from: "1aHLU3Qqsl9X_W_BEvZaPn_dkNV8UtXtJPnKedgKB",
                    where: ""
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

    <div id="googft-mapCanvas"></div>

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

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>if (!window.jQuery) { document.write('<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"><\/script>'); }
</script>

<script src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

</body>
</html>
