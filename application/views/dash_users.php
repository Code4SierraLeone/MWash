<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main>
    <div class="container section" id="users">
        <div class="row">
            <?php foreach ($users as $user) {
                if($user == NULL){ ?>
                <div class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title center-align">No User Request</span>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="col s6">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Username: <?php echo $user->username; ?></span>
                            <span class="card-title">Email: <?php echo $user->email; ?></span>
                        </div>
                        <div class="card-action">
                            <a href="#">Activate User</a>
                        </div>
                    </div>
                </div>
                <?php }
            }
            ?>
        </div>
    </div>
</main>