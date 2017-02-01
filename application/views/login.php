<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>MWASH | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel='stylesheet prefetch' href='<?php echo base_url(); ?>assets/css/materialize.min.css'>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Architects+Daughter|Roboto&subset=latin,devanagari'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>

    <style type="text/css">
        html,
        body{
            height: 100%;
        }
        main {
            padding: 0 !important;
            min-height: 100%;
        }
        .form-body {
            padding: 12px 24px;
        }
    </style>

</head>

<body>

<main class="valign-wrapper indigo">
    <div class="container valign">

        <!--  Tables Section-->
        <div id="login" class="row">
            <!-- <h1 class="thin">Login</h1> -->
            <div class="col s12 m8 l6 offset-m2 offset-l3 card-panel">
                <form class="login-form">
                    <div class="form-body">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="username" type="text" class="validate">
                                <label for="username">Username</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <a href="index.html" class="btn-large waves-effect waves-light col s12">Login</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6"></div>
                            <div class="col s6">
                                <p class="margin right-align medium-small"><a href="reset-password.html">Forgot password?</a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- container end -->

</main>


</body>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>if (!window.jQuery) { document.write('<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"><\/script>'); }
</script>
<script src='<?php echo base_url(); ?>assets/js/materialize.min.js'></script>

</body>
</html>
