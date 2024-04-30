<?php 

    session_unset();
    session_destroy();
    // header('location:login.php?loggedout');
    header('location:loginmerchant.php?loggedout');

exit();

?>