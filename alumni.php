<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

  <div class="table-responsive">
        
<?php
include_once 'header.php';

    $conn= mysqli_connect('localhost', 'root', '');
    mysqli_select_db($conn, 'kuetian');
    
    $sql ="SELECT roll_no, first_name, last_name, department, batch, phone, email FROM users";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0)
            {
                ?>
      <br><h1 style="font-family: arial; font-size: 20px;color: #111;line-height: 50px; text-align: center;">List of The KUETIANS</h1><br>
                <table class="table table-hover table-dark">
                <tr class="header">
                <th>Roll No</th>
                <th>Name</th>
                <th>Department</th>
                <th>Batch</th>
                <th>Phone NO</th>
                <th>Email</th>
                </tr>
                <?php
                while($ques=mysqli_fetch_assoc($result))
               {
      	            echo "<tr>";
                    echo "<td>".$ques['roll_no']."</td>";
                    echo "<td>".$ques['first_name']."&nbsp".$ques['last_name']."</td>";
                    echo "<td>".$ques['department']."</td>";
                    echo "<td>".$ques['batch']."</td>";
                    echo "<td>".$ques['phone']."</td>";
                    echo "<td>".$ques['email']."</td>";
                    echo "</tr>";
                }
            } 
            else 
            {
                echo "0 results";
            }
        

