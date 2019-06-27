<?php

session_start();

    if (isset($_POST['submit']))
    {
        $conn= mysqli_connect('localhost', 'root', '');
        mysqli_select_db($conn, 'kuetian');

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        
        if (empty($email) || empty($pwd))
        {
            header("Location:index.php?login=empty");
            exit();
        } 
        else 
        {
            $sql = "SELECT * FROM users WHERE email='$email';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck < 1)
            {
                header("Location:index.php?login=no_user");
                exit();
            } 
            else
            {
                if ($row = mysqli_fetch_assoc($result))
                {
                    /*$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);*/
                    if ($pwd != $row[user_pwd])
                    {
                        header("Location:index.php?login=wrong_password");
                        exit();
                    }
                    elseif ($pwd == $row[user_pwd])
                        
                    {
                        if (isset($_POST["remember"]))
                        {
                            $cookie_email = $_POST['email'];
                            $cookie_pwd = $_POST['pwd'];
                            setcookie('cookie_email', $cookie_email, time() + (86400 * 30)); // 86400 = 1 day
                            header("Location:profile.php?login=success");
                        }
                        else {
                            $_SESSION['email']=$email;
                            header("Location:profile.php?login=success");
                        }
                    }
                }
            }
            
        }
    } 
    else
    {
        header("Location:index.php?login=error");
        exit();
    }
