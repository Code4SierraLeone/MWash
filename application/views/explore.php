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
    <title>MWash | Explore Water Points In Sierra Leone</title>

    <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.png" type="image/x-icon"/>

    <link rel='stylesheet prefetch' href='<?php echo base_url(); ?>assets/css/materialize.min.css'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Architects+Daughter|Roboto&subset=latin,devanagari'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYHe93URHILf69tc1EtK7wuVd0rwKEOHw"></script>

    <script type="text/javascript">
        function initialize() {
            google.maps.visualRefresh = true;
            var body = document.body,
                html = document.documentElement;
            var height = Math.max( body.scrollHeight, body.offsetHeight,
                html.clientHeight, html.scrollHeight, html.offsetHeight );
            var rheight = height - 64;
            var mapDiv = document.getElementById('googft-mapCanvas');
            mapDiv.style.width = '100%';
            mapDiv.style.height = rheight +'px';
            var map = new google.maps.Map(mapDiv, {
            	<?php if ($province == 'Northern'){ ?>
				center: new google.maps.LatLng(8.9851565, -11.9271358),
				zoom: 9,
            	<?php }elseif ($province == 'Southern'){ ?>
				center: new google.maps.LatLng(7.7202549, -12.0994481),
				zoom: 10,
            	<?php }elseif ($province == 'Eastern'){?>
				center: new google.maps.LatLng(8.1509098, -11.0891087),
				zoom: 9,
            	<?php }elseif ($province == 'Western'){ ?>
				center: new google.maps.LatLng(8.3456411, -13.1650893),
				zoom: 12,
				<?php }else{ ?>
				center: new google.maps.LatLng(8.646785826402805, -11.696121582031306),
				zoom: 9,
				<?php } ?>
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
                    select: "col49",
                    from: "1aHLU3Qqsl9X_W_BEvZaPn_dkNV8UtXtJPnKedgKB",
                    where: "<?php
                        $conditions = array();

                        if ($province != 'all'){
                            $conditions[] = "province = '$province'";
                        }
                        if ($season == 'Unknown'){
                            $conditions[] = "season = ''";
                        }elseif ($season == 'Water'){
                            $conditions[] = "season = 'Water year-round'";
                        }elseif ($season == 'Dry'){
                            $conditions[] = "season = 'Dry Always / Never water'";
                        }elseif($season == 'Seasonal'){
                            $conditions[] = "season = 'Seasonal'";
                        }
                        if($functionality == 'functional'){
                            $conditions[] = "funct = 'Yes- functional'";
                        }elseif ($functionality == 'bdown'){
                            $conditions[] = "funct = 'No- broken down'";
                        }elseif ($functionality == 'pdamaged'){
                            $conditions[] = "funct = 'Yes- but partly damaged'";
                        }elseif ($functionality == 'sucon'){
                            $conditions[] = "funct = 'No- still under construction'";
                        }
                        if($mechanic == 'yes'){
                            $conditions[] = "mechanic = 'Yes'";
                        }elseif ($mechanic == 'no'){
                            $conditions[] = "mechanic = 'No'";
                        }elseif ($mechanic == 'unknown'){
                            $conditions[] = "mechanic = 'Unknown'";
                        }
                        if($parts == 'm20'){
                            $conditions[] = "parts = 'More than 20 miles'";
                        }elseif ($parts == 'wcom'){
                            $conditions[] = "parts = 'In this community'";
                        }elseif ($parts == 'w20'){
                            $conditions[] = "parts = 'Within 20 miles'";
                        }
                        if (count($conditions) > 0) {
                            $sql = implode(' and ', $conditions);
                            echo $sql;
                        }
                        ?>"
                },
				styles: [{
					where: "funct = 'Yes- functional'",
					markerOptions: {
						iconName: "small_green"
					}
				}, {
					where: "funct = 'No- broken down'",
					markerOptions: {
						iconName: "small_red"
					}
				}, {
					where: "funct = 'Yes- but partly damaged'",
					markerOptions: {
						iconName: "small_yellow"
					}
				}, {
					where: "funct = 'No- still under construction'",
					markerOptions: {
						iconName: "small_blue"
					}
				}],
                options: {
                    styleId: 2,
                    templateId: 2
                },
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

</head>
<body site-url="<?php echo base_url(); ?>">

<header>
    <nav class="nav-wrapper indigo darken-4">
        <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only"><i class="material-icons">menu</i></a></div>
        <div class="col s12">
            <ul class="right desk">
                <li class="right">
                    <a href="https://github.com/Code4SierraLeone/MWash/" target="_blank">Github</a>
                </li>
                <li class="right des">
                    <a href="<?php echo base_url(); ?>index.php/login" target="_blank">Dashboard</a>
                </li>
                <li class="right">
                    <a data-target="modal3" href="#modal3" class="modal-trigger">Quick Help</a>
                </li>
            </ul>
			<ul class="right mob">
				<li class="right">
					<a href="https://github.com/Code4SierraLeone/MWash/" target="_blank" class="fa fa-github-square fa-2x waves-effect waves-light tooltipped" data-position="bottom" data-delay="1" data-tooltip="Github"><span class="icon-text"></span></a>
				</li>
				<li class="right">
					<a href="<?php echo base_url(); ?>index.php/login" target="_blank" class="fa fa-user fa-2x waves-effect waves-light tooltipped" data-position="bottom" data-delay="1" data-tooltip="Dashboard"><span class="icon-text"></span></a>
				</li>
				<li class="right">
					<a data-target="modal3" href="#modal3" class="modal-trigger fa fa-question-circle fa-2x waves-effect waves-light tooltipped" data-position="down" data-delay="1" data-tooltip="Quick Help"><span class="icon-text"></span></a>
				</li>
			</ul>
        </div>
    </nav>
    <ul id="nav-mobile" style="border: 0px !important;" class="side-nav fixed collapsible collapsible-accordion">
        <li>
            <div class="row">
                <div style="margin: 0px;" class="card">
                    <div class="card-image">
                        <?php if($province == 'all'){ ?>
                            <img src="<?php echo base_url(); ?>assets/img/sierraleone-c.jpg">
                            <span class="card-title">Sierra Leone</span>
                        <?php }else if($province == 'Northern'){ ?>
                            <img src="<?php echo base_url(); ?>assets/img/northern-p.jpg">
                            <span class="card-title">Northern Province</span>
                        <?php }else if($province == 'Southern'){ ?>
                            <img src="<?php echo base_url(); ?>assets/img/southern-p.jpg">
                            <span class="card-title">Southern Province</span>
                        <?php }else if($province == 'Eastern'){ ?>
                            <img src="<?php echo base_url(); ?>assets/img/eastern-p.jpg">
                            <span class="card-title">Eastern Province</span>
                        <?php }else if($province == 'Western'){ ?>
                            <img src="<?php echo base_url(); ?>assets/img/western-p.jpg">
                            <span class="card-title">Western Province</span>
                        <?php }  ?>

                    </div>
                </div>
            </div>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-teal"><i class="material-icons">location_on</i>Filter By Province</a>
            <div class="collapsible-body" style="padding: 0px !important;">
                <ul>
                    <li id="allp"><a href="<?php echo base_url(); ?>index.php/explore/all/<?= $season ?>/<?= $functionality ?>/<?= $mechanic ?>/<?= $parts ?>">All Provinces</a></li>
                    <li id="nth"><a href="<?php echo base_url(); ?>index.php/explore/Northern/<?= $season ?>/<?= $functionality ?>/<?= $mechanic ?>/<?= $parts ?>">Nothern</a></li>
                    <li id="sth"><a href="<?php echo base_url(); ?>index.php/explore/Southern/<?= $season ?>/<?= $functionality ?>/<?= $mechanic ?>/<?= $parts ?>">Southern</a></li>
                    <li id="est"><a href="<?php echo base_url(); ?>index.php/explore/Eastern/<?= $season ?>/<?= $functionality ?>/<?= $mechanic ?>/<?= $parts ?>">Eastern</a></li>
                    <li id="wst"><a href="<?php echo base_url(); ?>index.php/explore/Western/<?= $season ?>/<?= $functionality ?>/<?= $mechanic ?>/<?= $parts ?>">Western</a></li>
                </ul>
            </div>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-teal"><i class="material-icons">cloud</i>Filter By Season</a>
            <div class="collapsible-body" style="padding: 0px !important;">
                <ul>
                    <li id="alls"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/all/<?= $functionality ?>/<?= $mechanic ?>/<?= $parts ?>">All Seasons</a></li>
                    <li id="wyr"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/Water/<?= $functionality ?>/<?= $mechanic ?>/<?= $parts ?>">Water Year Round</a></li>
                    <li id="sea"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/Seasonal/<?= $functionality ?>/<?= $mechanic ?>/<?= $parts ?>">Seasonal</a></li>
                    <li id="dry"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/Dry/<?= $functionality ?>/<?= $mechanic ?>/<?= $parts ?>">Dry Always / Never Water</a></li>
                    <li id="unk"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/Unknown/<?= $functionality ?>/<?= $mechanic ?>/<?= $parts ?>">Unknown</a></li>
                </ul>
            </div>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-teal"><i class="material-icons">settings</i>Filter By Functionality</a>
            <div class="collapsible-body" style="padding: 0px !important;">
                <ul>
                    <li id="allf"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/<?= $season ?>/all/<?= $mechanic ?>/<?= $parts ?>">All</a></li>
                    <li id="func"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/<?= $season ?>/functional/<?= $mechanic ?>/<?= $parts ?>">Functional</a></li>
                    <li id="bdown"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/<?= $season ?>/bdown/<?= $mechanic ?>/<?= $parts ?>">Broken Down</a></li>
                    <li id="pdam"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/<?= $season ?>/pdamaged/<?= $mechanic ?>/<?= $parts ?>">Working But Partly Damaged</a></li>
                    <li id="sucon"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/<?= $season ?>/sucon/<?= $mechanic ?>/<?= $parts ?>">Still Under Construction</a></li>
                </ul>
            </div>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-teal"><i class="material-icons">build</i>Filter By Mechanic</a>
            <div class="collapsible-body" style="padding: 0px !important;">
                <ul>
                    <li id="allm"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/<?= $season ?>/<?= $functionality ?>/all/<?= $parts ?>">All</a></li>
                    <li id="yesm"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/<?= $season ?>/<?= $functionality ?>/yes/<?= $parts ?>">Yes</a></li>
                    <li id="nom"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/<?= $season ?>/<?= $functionality ?>/no/<?= $parts ?>">No</a></li>
                    <li id="unknwm"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/<?= $season ?>/<?= $functionality ?>/unknown/<?= $parts ?>">Unknown</a></li>
                </ul>
            </div>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-teal"><i class="material-icons">extension</i>Filter By Parts Availability</a>
            <div class="collapsible-body" style="padding: 0px !important;">
                <ul>
                    <li id="allpa"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/<?= $season ?>/<?= $functionality ?>/<?= $mechanic ?>/all">All</a></li>
                    <li id="m20"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/<?= $season ?>/<?= $functionality ?>/<?= $mechanic ?>/m20">More Than 20 Miles</a></li>
                    <li id="wcom"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/<?= $season ?>/<?= $functionality ?>/<?= $mechanic ?>/wcom">In This Community</a></li>
                    <li id="w20"><a href="<?php echo base_url(); ?>index.php/explore/<?= $province ?>/<?= $season ?>/<?= $functionality ?>/<?= $mechanic ?>/w20">Within 20 Miles</a></li>
                </ul>
            </div>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-teal" data-target="modal2" href="#modal2"><i class="material-icons">phone_android</i>Subscribe</a></li>
    </ul>
</header>

<main>

    <div class="card desk" style="position: fixed; z-index: 99; width: 20%; right: 10px; background-color: rgba(255, 255, 255, 0.9) !important;">
        <div id="wp-status-desk" class="card-content">
            <h4 style="text-align: center;"></h4>
        </div>
    </div>

	<div class="card mob" style="margin: 0 !important;">
		<div id="wp-status-mob" class="card-content">
			<h4 style="text-align: center;"></h4>
		</div>
	</div>

    <div id="googft-mapCanvas"></div>

</main>

<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Water Point Update</h4>
        <p id="init_msg">Hi, you can take part in providing an update about the condition of water points where you live. You will only be able to update only some few attributes. Select which attribute you want to update then click the SUBMIT button.</p>
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
                        <label for="text">Provide Water Point ID</label>
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

<div id="modal2" class="modal">
    <div class="modal-content">
        <h4>Subscribe</h4>
        <p id="init_sub_msg">Start getting updates on your phone via SMS about the condition of the water points around your area. There are two options below, select the one you are most convenient with.</p>
        <div class="row">
            <div class="col s12 m6">
                <div class="card white">
                    <a id="sub1" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                    <div class="card-content black-text">
                        <span class="card-title" style="text-align: center !important;">Easy</span>
                        <p id="countregusers" style="text-align: center;">By selecting red button below in this option you will have to provide the names of your province, district and chiefdom including your phone number.</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card white">
                    <a id="sub2" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                    <div class="card-content black-text">
                        <span class="card-title" style="text-align: center !important;">Very Easy</span>
                        <p id="countregusers" style="text-align: center;">By selecting red button below in this option you will provide the water point id from which i presume you found it on map and your phone number. Very Easy.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <form id="subcription-form" class="col s12">
                <div class="row" style="display: none;">
                    <div class="input-field col s12">
                        <input name="waterp_id" id="waterp_id" type="text" class="validate">
                        <label for="text">Water Point ID</label>
                    </div>
                </div>
                <div class="row" style="display: none;">
                    <div class="input-field col s12">
                        <input name="prov_id" id="prov_id" type="text" class="validate">
                        <label for="text">Province Name</label>
                    </div>
                </div>
                <div class="row" style="display: none;">
                    <div class="input-field col s12">
                        <input name="dist_id" id="dist_id" type="text" class="validate">
                        <label for="text">District Name</label>
                    </div>
                </div>
                <div class="row" style="display: none;">
                    <div class="input-field col s12">
                        <input name="chief_id" id="chief_id" type="text" class="validate">
                        <label for="text">Chiefdom Name</label>
                    </div>
                </div>
                <div class="row" style="display: none;">
                    <div class="input-field col s12">
                        <input name="phone" id="phone" type="text" class="validate">
                        <label for="text">Phone Number</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat left">Close</a>
        <a style="color: #ffffff !important; display: none;" class="waves-effect indigo lighten-1 waves-green btn-flat" id="submit-subscription">Submit</a>
    </div>
</div>

<div id="modal3" class="modal">
    <div class="modal-content">
        <h4>A Quick User Guide</h4>
        <p>What You Can Do On This Page</p>
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <div class="collapsible-header"><i class="material-icons">filter_list</i>Filter Data</div>
                <div class="collapsible-body">
                    <span>This application provides you with options to filter data easily by Province, Seasons, Functionality, Mechanic and Parts Availability.</span>
                    <p><strong>Filter By Province:</strong> You can click and select one of 4 provinces in Sierra Leone.</p>
                    <p><strong>Filter By Seasons:</strong> You can click and select one of the water seasons experienced in Sierra Leone.</p>
                    <p><strong>Filter By Functionality:</strong> You can click and select the water point operational mechanism.</p>
                    <p><strong>Filter By Mechanic:</strong> You can click and select one of the options that answers the question; Whether the water point has an available individual that repairs the water point incase of any incidence.</p>
                    <p><strong>Filter By Parts Availability:</strong> You can click and select one of the options that answers the question;  How far are people able to access spare parts and tools to fix and maintain the water points near them.</p>
                </div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">phone_android</i>Subscribe</div>
                <div class="collapsible-body"><span>You can easily subscribe to updates and get SMS alerts on your phone about specific water points that you require information by providing your phone number.</span></div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">mode_edit</i>Contribute</div>
                <div class="collapsible-body"><span>You can easily update the current water point data by updating some attributes about the condition of the water point.</span></div>
            </li>
        </ul>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat left">Close</a>
    </div>
</div>

<div class="fixed-action-btn modal-trigger">
    <a class="btn-floating tooltipped indigo btn-large" data-position="left" data-delay="1" data-tooltip="Contribute" data-target="modal1" href="#modal1">
        <i class="large material-icons">mode_edit</i>
    </a>
</div>
<div class="backhome">
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
<script src="<?php echo base_url(); ?>assets/js/explore_custom.js"></script>

</body>
</html>
