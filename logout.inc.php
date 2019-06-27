<?php

if (isset($_POST['submit']))
{
    if(isset($_COOKIE['cookie_email']))
    {
        setcookie('cookie_email', "", time() - 3600);
        header('Location:index.php');
    }
    else {
        session_start();
        session_unset();
        session_destroy();
        header("Location:index.php");
        exit();
    }
}
 else {
        if(isset($_COOKIE['cookie_email']))
    {
        setcookie('cookie_email', "", time() - 3600);
        header('Location:index.php');
    }
    else {
        session_start();
        session_unset();
        session_destroy();
        header("Location:index.php");
        exit();
    }
    }
    

