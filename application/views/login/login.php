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

        <div id="login" class="row">

            <div class="col s12 m8 l6 offset-m2 offset-l3 card-panel">
                <?= form_open() ?>
                    <div class="form-body">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="username" name="username" type="text" class="validate">
                                <label for="username">Username</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" name="password" type="password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="submit" class="btn-large waves-effect waves-light col s12" value="Login">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6"></div>
                            <div class="col s6">
                                <p class="margin right-align medium-small"><a href="<?= base_url(); ?>">Forgot password?</a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>
