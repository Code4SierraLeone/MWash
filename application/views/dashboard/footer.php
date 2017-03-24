<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="modal1" class="modal">
   <?php if($page === 'dash'):  ?>
       <div class="modal-content">
           <h4>Dashboard Page Info</h4>
           <p><strong>MWash Subscribers:</strong> The number of people who have subscribed for updates about specific water points.</p>
           <p><strong>Updates By Community:</strong> The number of changes that have been performed to specific water points attributes by users.</p>
       </div>
   <?php elseif ($page === 'newpoint'): ?>
       <div class="modal-content">
           <h4>Add New Water Point Page Info</h4>
           <p>You can create a new water point by filling the necessary attributes of the water point.</p>
       </div>
   <?php elseif ($page === 'users'): ?>
       <div class="modal-content">
           <h4>Users Page Info</h4>
           <p><strong>User Profile:</strong> You can edit your email and password.</p>
           <p><strong>User Accesss Privilege:</strong> Comming Soon....provides access to the dashboard for other users.</p>
       </div>
   <?php else: ?>

   <?php endif; ?>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>

</body>

<!--  Scripts-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>if (!window.jQuery) { document.write('<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"><\/script>'); }</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin/simplebar.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/custom.js"></script>

</html>