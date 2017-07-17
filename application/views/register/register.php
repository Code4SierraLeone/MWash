<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<main class="valign-wrapper indigo">
    <div class="container valign">

        <?php if (validation_errors()) : ?>
            <div class="row">
                <div class="col s12">
                    <div class="card blue-grey lighten-1">
                        <div class="card-content white-text">
                            <p><?= validation_errors() ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if (isset($error)) : ?>
            <div class="row">
                <div class="col s12">
                    <div class="card blue-grey lighten-1">
                        <div class="card-content white-text">
                            <p><?= $error ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!--  Tables Section-->
        <div id="login" class="row">
            <!-- <h1 class="thin">Login</h1> -->
            <div class="col s12 m8 l6 offset-m2 offset-l3 card-panel">
                <?= form_open() ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="username" name="username" placeholder="At least 4 characters, letters or numbers only" type="text" class="validate">
                                <label for="username">Username</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" name="email" placeholder="A valid email address" type="text" class="validate">
                                <label for="username">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" name="password" placeholder="At least 6 characters" type="password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password_confirm" name="password_confirm" placeholder="Must match your password" type="password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <?php echo $this->recaptcha->render(); ?>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="submit" class="btn-large waves-effect waves-light col s12" value="Create">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6"></div>
                            <div class="col s6">
                                <p class="margin right-align medium-small"><a href="<?= base_url(); ?>index.php/login">Back To Login</a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- container end -->

</main>
