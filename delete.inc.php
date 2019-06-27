<?php
$conn= mysqli_connect('localhost', 'root', '');
        mysqli_select_db($conn, 'kuetian');
        
        
        
        $email = $_GET['en'];
    
        
        
        $sql = "DELETE FROM users WHERE email='$email'";
        
        $result = mysqli_query($conn, $sql);
                    if ($result)
                    {
                        header("Location:logout.inc.php?delete=successful");
                        exit();
                    }
                    else  
                    {
                        
                            $_SESSION['email']=$email;
                            header("Location:profile.php?delete=unsuccessful");
                        
                    }


