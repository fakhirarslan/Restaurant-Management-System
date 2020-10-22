<?php
    session_start();
    session_destroy();
    $back = 'index.php';
    echo "Logout Successful";
    echo '<meta http-equiv="refresh" content="0;url=' . $back . '">';
?>