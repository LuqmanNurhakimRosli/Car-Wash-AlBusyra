<?php
    session_start();
    //Destroy session
    if(session_destroy()) {
        //Redirecting to Home Page
        header("Location: index.php");
    }


?>