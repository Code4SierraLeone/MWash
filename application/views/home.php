<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="mwash,mwash app,water sanitation,water in sierra leone,">
    <meta name="description" content="Mapping the availability of water and sanitation points in Sierra Leone.">

    <title>MWASH | Water & Sanitation Mapping Site</title>

    <!-- Facebook Open Graph -->
    <meta property="og:title" content="MWash App" />
    <meta property="og:description" content="Mapping the availability of water and sanitation points in Sierra Leone." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:title" content="Mwash App" />
    <meta name="twitter:description" content="Mapping the availability of water and sanitation points in Sierra Leone." />
    <meta name="twitter:image" content="" />

    <!-- Google Plus Snippet -->
    <meta itemprop="name" content="MWash App">
    <meta itemprop="description" content="Mapping the availability of water and sanitation points in Sierra Leone.">
    <meta itemprop="image" content="">

    <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.png" type="image/x-icon"/>

    <link rel='stylesheet prefetch' href='<?php echo base_url(); ?>assets/css/materialize.min.css'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Architects+Daughter|Roboto&subset=latin,devanagari'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/home-custom.css">


</head>

<body class="welcome">
<span id="splash-overlay" class="splash"></span>
<span id="welcome" class="z-depth-4"></span>

<header class="navbar-fixed">
    <nav class="row indigo darken-4">
		<div class="col s12">
			<ul class="right desk">
				<li class="right">
					<a href="https://github.com/Code4SierraLeone/MWash/" target="_blank">Github</a>
				</li>
				<li class="right des">
					<a href="<?php echo base_url(); ?>index.php/login" target="_blank">Dashboard</a>
				</li>
			</ul>
		</div>
    </nav>
</header>

<main class="valign-wrapper back-img">
    <span class="container white-text span-shadow">

      <h1 class="title white-text" style="font-size: 5.2rem !important;">MWASH</h1>

      <blockquote class="flow-text custom-quote">Get information about basic facilities that ensure the provision of safe drinking water for citizens in Sierra Leone.</blockquote>

      <div class="center-align">

        <a href="index.php/explore/all/all/all/all/all" class="waves-effect indigo waves-light btn">Explore Water Points</a>

      </div>

    </span>
</main>

<div class="fixed-action-btn">
    <a href="#message" class="modal-trigger btn btn-large btn-floating tooltipped indigo waves-effect waves-light" data-position="left" data-delay="1" data-tooltip="About Mwash">
        <i class="large material-icons">message</i>
    </a>
</div>

<div id="message" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>About MWash</h4>
        <p>We aim to provide information about basic facilities in ensuring the provision of safe drinking water for citizens in Sierra Leone, improve on information dissemination on sanitation and hygiene in the country especially slums and riverine communities and use technology to improve on information about water and sanitation at community level.</p>
        <p>The need and desire to address waste management issues has already been variously identified. The application can be used as a way for citizens to report in real time issues around waste management service delivery.</p>
        <p style="text-align: center;">Supported By</p>
        <img src="<?= base_url() ?>assets/img/c4a-min.png" style="display: block; margin: 0 auto;" />
        </p>
    </div>
    <div class="modal-footer">
        <a class="modal-action modal-close waves-effect btn-flat">close</a>
    </div>
</div>

<footer class="page-footer indigo darken-3">
    <div class="footer-copyright indigo darken-4">
        <div class="container">
            <span>MWash is supported by <a href="https://codeforsierraleone.org/" target="_blank">Code For Sierra Leone</a> as part of the wider <a href="https://codeforafrica.org" target="_blank">Code For Africa </a>federation. All code on this website is <a href="https://github.com/Code4SierraLeone/MWash/" target="_blank">Open Source.</a></span>
        </div>
    </div>
</footer>
</body>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>if (!window.jQuery) { document.write('<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"><\/script>'); }
</script>
<script src='<?php echo base_url(); ?>assets/js/materialize.min.js'></script>
<script src="<?php echo base_url(); ?>assets/js/home_custom.js"></script>

</body>
</html>
