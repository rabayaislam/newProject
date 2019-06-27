<?php

session_start();

    if (isset($_POST['submit1']))
    {
        $conn= mysqli_connect('localhost', 'root', '');
        mysqli_select_db($conn, 'kuetian');
    
        $roll = mysqli_real_escape_string($conn, $_POST['roll_no']);
        $first = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last = mysqli_real_escape_string($conn, $_POST['last_name']);
        $dept = mysqli_real_escape_string($conn, $_POST['department']);
        $batch = mysqli_real_escape_string($conn, $_POST['batch']);
        $phn = mysqli_real_escape_string($conn, $_POST['phone']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        
        
        if (empty($roll) || empty($first) || empty($last) || empty($pwd))
        {
            header("Location:profile.php?signup=empty");
            exit();
        }
        else
        {
            if (!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$/",$last) || !preg_match("/^[0-9]*$/",$roll))
            {
                header("Location:profile.php?update=invalid");
                exit();
            }
            else
            {
                 $sql = "UPDATE users SET roll_no='$roll',first_name='$first',last_name='$last',department='$dept',batch='$batch',phone='$phn',user_pwd='$pwd' WHERE roll_no='$roll'";
                    $result = mysqli_query($conn, $sql);
                    if ($result)
                    {
                        $_SESSION['email']=$email;
                        header("Location:index.php?update=successful?login again");
                        exit();
                    }
                    else  
                    {
                        
                            $_SESSION['email']=$email;
                            header("Location:index.php?udate=unsuccessful");
                        
                    }
                }
            }
        }
    
    elseif (isset($_POST['submit2']))
    {
        header("Location:profile.php");
        exit();
  
    }