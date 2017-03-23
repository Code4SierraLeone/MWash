<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main>
    <div class="container section" id="users">
        <div class="row">
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo base_url(); ?>assets/img/avatar.jpg">
                        <span class="card-title" id="card-username"><?= ucfirst($username); ?></span>
                    </div>
                    <div class="card-content">
<!--                        <p><a class="waves-effect waves-light btn"><i class="material-icons left">mode_edit</i>Change Email</a></p>-->
<!--                        <p><a class="waves-effect waves-light btn"><i class="material-icons left">mode_edit</i>Change Password</a></p>-->
                        <ul class="collapsible" data-collapsible="accordion">
                            <li>
                                <div class="collapsible-header"><i class="material-icons">mode_edit</i>Change Email</div>
                                <div class="collapsible-body">
                                    <form id="update-email">
                                        <label id="e_resp"></label>
                                        <input placeholder="New Email" id="new_email" name="new_email" type="text" class="validate">
                                        <a style="color: #ffffff !important;" class="waves-effect indigo lighten-1 waves-green btn-flat" id="submit-email-update">Update</a>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header"><i class="material-icons">mode_edit</i>Change Password</div>
                                <div class="collapsible-body">
                                    <form id="update-password">
                                        <label id="p_resp"></label>
                                        <input placeholder="New Password" id="new_password" name="new_password" type="text" class="validate">
                                        <a style="color: #ffffff !important;" class="waves-effect indigo lighten-1 waves-green btn-flat" id="submit-password-update">Update</a>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>