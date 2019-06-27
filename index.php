<?php
     include_once 'header.php';
     include_once 'dbh.inc.php';
        include_once 'table.inc.php';
     
     if(isset($_COOKIE['cookie_email']))
{
	header("Location:profile.php");
}
 else {
?>
<style>
body
{
    background-color: #ccc;
    background: url(k.jpg) no-repeat center center fixed;
    background-size: cover;
}
</style>
<script>
function validateForm() 
{
  var x = document.forms["myForm"]["email"].value;
  if (x == "") {
    alert("Email must be filled out");
    return false;
  }
}
</script>
<section id="main-container">
    <div id="main_wrapper">
        <form name="myForm" id="login-form" action="login.inc.php" onsubmit="return validateForm()" method="POST">
            <input type="text" name="email" placeholder="E-Mail">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="submit">Login</button>
            <label>
                <input style="width: 20px; height: 20px;" type="checkbox" checked="unchecked" name="remember"> <br><b style="font-size:100%;">Remember me<b>
            </label>
        </form>
    </div>
</section>
        
<?php
 }
     include_once 'footer.php';
?>


