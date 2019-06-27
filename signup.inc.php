<?php

session_start();

    if (isset($_POST['submit']))
    {
        $conn= mysqli_connect('localhost', 'root', '');
        mysqli_select_db($conn, 'kuetian');
    
        $roll = mysqli_real_escape_string($conn, $_POST['roll_no']);
        $first = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last = mysqli_real_escape_string($conn, $_POST['last_name']);
        $dept = mysqli_real_escape_string($conn, $_POST['department']);
        $batch = mysqli_real_escape_string($conn, $_POST['batch']);
        $phn = mysqli_real_escape_string($conn, $_POST['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        
        
        if (empty($roll) || empty($first) || empty($last) || empty($email) || empty($pwd))
        {
            header("Location:signup.php?signup=empty");
            exit();
        }
        else
        {
            if (!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$/",$last) || !preg_match("/^[0-9]*$/",$roll))
            {
                header("Location:signup.php?signup=invalid");
                exit();
            }
            else
            {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    header("Location:signup.php?signup=invaildemail");
                    exit();
                }
                else
                {
                    $sql = "SELECT * FROM users WHERE roll_no='$roll';";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck > 1)
                    {
                        header("Location:signup.php?signup=useralreadyexists");
                        exit();
                    }
                    else  
                    {
                        $sql = "INSERT INTO users (roll_no, first_name, last_name, department, batch, phone, email, user_pwd) VALUES ('$roll', '$first', '$last', '$dept', '$batch', '$phn', '$email', '$pwd');";
                        mysqli_query($conn, $sql);
                        if (isset($_POST["remember"]))
                        {
                            $cookie_email = $_POST['email'];
                            setcookie('cookie_email', $cookie_email, time() + (86400 * 30)); // 86400 = 1 day
                            header("Location:profile.php?signup=success");
                        }
                        else
                        {
                            $_SESSION['email']=$email;
                            header("Location:profile.php?signup=success");
                        }
                    }
                }
            }
        }
    }
    
    else 
    {
        header("Location:signup.php");
        exit();
    }
