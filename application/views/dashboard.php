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

    <div class="brand-logo hide-on-large-only indigo darken-3"></div>
    <div class="navbar-fixed hide-on-large-only">
        <nav>
            <div class="nav-wrapper">
                <ul class="right">
                    <li class="hide-on-small-only"><a href="account.html"><i class="material-icons">perm_identity</i></a></li>
                    <li class="hide-on-small-only"><a href="login.html" target="_blank"><i class="material-icons">exit_to_app</i></a></li>
                    <li class="toogle-side-nav"><a href="#" data-activates="slide-menu" class="button-collapse"><i class="material-icons">menu</i></a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div id="slide-menu" class="side-nav fixed" data-simplebar-direction="vertical">
        <ul class="side-nav-main">
            <li class="logo hide-on-med-and-down indigo darken-3"></li>
            <li class="side-nav-inline hide-on-med-only"> <a href="login.html" style="height: 52px !important;" class="inline waves-effect" target="_blank"><i class="material-icons">exit_to_app</i></a> <a href="account.html" style="height: 52px !important;" class="inline waves-effect"><i class="material-icons">perm_identity</i></a> </li>
            <li><a href="#" class="waves-effect"><span>Dashboard</span></a></li>
        </ul>
    </div>

</header>

<main>
    <div class="container">
        <h1 class="thin">Messages</h1>
        <!--  Tables Section-->
        <div id="messages" class="mailbox section">
            <div class="row">
                <div class="col s12">
                    <div class="z-depth-1">
                        <nav class="z-depth-0">
                            <div class="nav-wrapper indigo darken-3">
                                <div class="col s10 m7">
                                    <form>
                                        <div class="input-field round-in-box">
                                            <input id="search" type="search" required>
                                            <label for="search"><i class="material-icons">search</i></label>
                                            <i class="material-icons">close</i> </div>
                                    </form>
                                </div>
                                <div class="col s2 m5">
                                    <ul class="right">
                                        <li class="hide-on-small-only"><a href="#!"><i class="material-icons">archive</i></a></li>
                                        <li class="hide-on-small-only"><a href="#!"><i class="material-icons">delete</i></a></li>
                                        <li class="hide-on-small-only"><a href="#!"><i class="material-icons">settings</i></a></li>
                                        <li class="hide-on-med-and-up"> <a href="#!" class="dropdown-button" data-activates="dropdown1"><i class="mdi-navigation-more-vert"></i></a>
                                            <ul id="dropdown1" class="dropdown-content slim">
                                                <li><a href="#!"><i class="mdi-content-archive"></i></a></li>
                                                <li><a href="#!"><i class="mdi-action-delete"></i></a></li>
                                                <li class="divider"></li>
                                                <li><a href="#!"><i class="mdi-action-settings"></i></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <ul class="tabs tab-demo">
                            <li class="tab col s6"><a class="active" href="#main-mailbox">Main<span class="new badge">2</span></a></li>
                            <li class="tab col s6"><a href="#social-mailbox">Community Feeback</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col s12">
                    <div class="card-panel no-padding">
                        <!--  MAIN mailbox START-->
                        <div id="main-mailbox">
                            <form action="#">
                                <table class="list bordered highlight">
                                    <thead>
                                    <tr>
                                        <th colspan="2" class="first">Today</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="unreaded">
                                        <td class="check-col"><input type="checkbox" id="checkbox1" class="filled-in" />
                                            <label for="checkbox1"></label></td>
                                        <td><a href="#!" class="cell-row">
                                                <div class="cell"> <span class="simple-avatar small circle left cyan accent-4">A</span>
                                                    <h6>Abbie Nicolson</h6>
                                                    <p>Todays trends in webdesign</p>
                                                </div>
                                                <div class="cell w2 last"> <span class="new badge static"></span> <span class="datetime">17min ago</span> </div>
                                            </a></td>
                                    </tr>
                                    <tr class="unreaded">
                                        <td class="check-col"><input type="checkbox" id="checkbox2"  class="filled-in"  />
                                            <label for="checkbox2"></label></td>
                                        <td><a href="#!" class="cell-row">
                                                <div class="cell"> <span class="simple-avatar small circle left cyan accent-4">D</span>
                                                    <h6>Dany Redmont</h6>
                                                    <p>Css Framework comparision</p>
                                                </div>
                                                <div class="cell w2 last"> <span class="new badge static"></span> <span class="datetime">2h ago </span> </div>
                                            </a></td>
                                    </tr>
                                    <tr>
                                        <td class="check-col"><input type="checkbox" id="checkbox3"  class="filled-in" />
                                            <label for="checkbox3"></label></td>
                                        <td><a href="#!" class="cell-row">
                                                <div class="cell"> <span class="simple-avatar small circle left amber accent-2">S</span>
                                                    <h6>Sonia Niedermeyer</h6>
                                                    <p>Donec eget dolor fermentum, venenatis dolor</p>
                                                </div>
                                                <div class="cell w2 last"> <span class="datetime">23 hours ago</span> </div>
                                            </a></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </form>
                        </div>

                        <div id="social-mailbox">
                            <form action="#">
                                <table class="list bordered highlight">
                                    <thead>
                                    <tr>
                                        <th colspan="2" class="first">Today</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="unreaded">
                                        <td class="check-col"><input type="checkbox" id="checkbox1" class="filled-in" />
                                            <label for="checkbox1"></label></td>
                                        <td><a href="#!" class="cell-row">
                                                <div class="cell">
                                                    <h6>Abbie Nicolsonn</h6>
                                                    <p>Todays trends in webdesign</p>
                                                </div>
                                                <div class="cell w2 last"> <span class="new badge static"></span> <span class="datetime">17min ago</span> </div>
                                            </a></td>
                                    </tr>
                                    <tr class="unreaded">
                                        <td class="check-col"><input type="checkbox" id="checkbox2"  class="filled-in"  />
                                            <label for="checkbox2"></label></td>
                                        <td><a href="#!" class="cell-row">
                                                <div class="cell">
                                                    <h6>Dany Redmontt</h6>
                                                    <p>Cards are a convenient means of displaying content composed of different types of objects. They’re also well-suited for presenting similar objects whose size or supported actions can vary considerably, like photos with captions of variable length.</p>
                                                </div>
                                                <div class="cell w2 last"> <span class="new badge static"></span> <span class="datetime">2h ago </span> </div>
                                            </a></td>
                                    </tr>
                                    <tr>
                                        <td class="check-col"><input type="checkbox" id="checkbox3"  class="filled-in" />
                                            <label for="checkbox3"></label></td>
                                        <td><a href="#!" class="cell-row">
                                                <div class="cell">
                                                    <h6>Sonia Niedermeyerr</h6>
                                                    <p>Donec eget dolor fermentum, venenatis dolor</p>
                                                </div>
                                                <div class="cell w2 last"> <span class="datetime">23 hours ago</span> </div>
                                            </a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <!-- container END -->

    <!-- New message Modal Trigger -->
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;"> <a class="btn-floating btn-large indigo darken-3 modal-trigger" href="#modal1"> <i class="material-icons">edit</i> </a> </div>

    <!-- New message Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content no-padding">
            <nav class="">
                <div class="nav-wrapper indigo darken-3">
                    <div class="left col s7">
                        <p class="blue-grey-text text-lighten-4" style="margin:0; padding-left:20px;">New message </p>
                    </div>
                    <div class="col s5">
                        <ul class="right">
                            <li><a href="#!"><i class="material-icons">close</i></a> </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="form-pad">
                <form>
                    <div class="input-field">
                        <input id="subject" type="text" class="validate">
                        <label for="subject">Subject</label>
                    </div>
                    <div class="input-field">
                        <textarea id="message" class="materialize-textarea" length="50"></textarea>
                        <label for="message">Message</label>
                    </div>
            </div>
        </div>
        <div class="modal-footer"> <a href="#!" class=" modal-action modal-close waves-effect btn-flat right">Send</a> </div>
        </form>
    </div>
</main>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>if (!window.jQuery) { document.write('<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"><\/script>'); }</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin/simplebar.min.js"></script>
<!--materialize js-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin/custom.js"></script>


</body>
</html>