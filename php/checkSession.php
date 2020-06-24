<?php
    session_cache_expire(1);
    session_start();
    if (!isset($_SESSION['acesso'])) {
        echo json_encode(0);
    }
    else if ($_SESSION['acesso']){
        echo json_encode(1);
        $_SESSION['acesso'] = false;
        session_destroy();
    }
    else{
        echo json_encode(2);
        session_destroy();
    }
?>