<?php
    include_once 'header.php';
    
    include_once 'dbh.inc.php';
    include_once 'table.inc.php';
    $conn= mysqli_connect('localhost', 'root', '');
        mysqli_select_db($conn, 'kuetian');
    
    if(isset($_COOKIE['cookie_email']))
    {
    
    ?>
<h2>Welcome <?php echo $_COOKIE['cookie_email']; ?></h2>
<style>
    body{
        font-family: arial;
        font-size: 20px;
        color: #111;
        line-height: 25px;
       text-align: center;
    }

</style>
    <?php
   
    $e= $_COOKIE['cookie_email'];
    
    $sql = "SELECT roll_no, first_name, last_name, department, batch, phone, email FROM users WHERE email='$e'";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
      if($resultCheck>0){
        while($ques=mysqli_fetch_assoc($result))
            { 
      	        echo "Roll NO: ". $ques['roll_no']. "<br>". "Name: ". $ques['first_name']."&nbsp".$ques['last_name']. "<br>". 
                        "Department: ". $ques['department']. "<br>". "Batch: ". $ques['batch']. "<br>". "Phone NO: ". $ques['phone']. "<br>". "Email: ". $ques['email']. "<br>". "<br>". "<br>". "<br>". 
                        "<a href='delete.inc.php?en=$ques[email]' onclick='return checkdelete()'>Delete Account?</a>". "<br>". 
                        "<a href='update.php'>Update</a>". "<br>". 
                        "<a href='logout.inc.php'>Logout</a>";
            }  
} else {
    echo "0 results";
}


    ?>


<script>
    function checkdelete()
    {
        return confirm('Are you sure you want to delete your account?');
    }
    </script>

<?php 
    }
 else {
         ?>
<h2>Welcome <?php echo $_SESSION['email']; ?></h2>
<style>
    body{
        font-family: arial;
        font-size: 20px;
        color: #111;
        line-height: 25px;
       text-align: center;
    }

</style>
    <?php
   
    $e= $_SESSION['email'];
    
    $sql = "SELECT roll_no, first_name, last_name, department, batch, phone, email FROM users WHERE email='$e';";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
      if($resultCheck>0){
        while($ques=mysqli_fetch_assoc($result))
            {
      	        echo "Roll NO: ". $ques['roll_no']. "<br>". "Name: ". $ques['first_name']."&nbsp".$ques['last_name']. "<br>". 
                        "Department: ". $ques['department']. "<br>". "Batch: ". $ques['batch']. "<br>". "Phone NO: ". $ques['phone']. "<br>". "Email: ". $ques['email']. "<br>". "<br>". "<br>". "<br>". 
                        "<a href='delete.inc.php?en=$ques[email]'  onclick='return checkdelete()'>Delete Account?</a>". "<br>". 
                        "<a href='update.php'>Update</a>". "<br>". 
                        "<a href='logout.inc.php'>Logout</a>";
            }  
} else {
    echo "0 results";
}


    ?>


<script>
    function checkdelete()
    {
        return confirm('Are you sure you want to delete your account?');
    }
    </script>

<?php
}

     include_once 'footer.php';
?>