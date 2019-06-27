<?php
     include_once 'header.php';
?>

<script>
function validateForm() 
{
  var a = document.forms["myForm"]["roll_no"].value;
  var b = document.forms["myForm"]["first_name"].value;
  var c = document.forms["myForm"]["last_name"].value;
  var d = document.forms["myForm"]["email"].value;
  var e = document.forms["myForm"]["pwd"].value;
  if (a == "" || b == "" || c == "" || d == "" || e =="") {
    alert("empty input");
    return false;
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    alert("invalid email");
                    return false;
                }     
}
</script>
        
<section id="main-container">
    <div id="main_wrapper">
        <h2>Sign Up</h2>
        <form name="myForm" id="signup-form" action="signup.inc.php" onsubmit="return validateForm()" method="POST">
            <input type="text" name="roll_no" placeholder="Roll NO">
            <input type="text" name="first_name" placeholder="First Name">
            <input type="text" name="last_name" placeholder="Last Name">
            <input type="text" name="department" placeholder="Department">
            <input type="text" name="batch" placeholder="Batch">
            <input type="text" name="phone" placeholder="Phone">
            <input type="text" name="email" placeholder="E-Mail">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="submit">SignUp</button>
            <label id="f">
                <input style="width: 20px; height: 20px;" type="checkbox" checked="unchecked" name="remember"> <br><b style="font-size:100%;">Remember me<b>
            </label>
        </form>
    </div>
</section>
        
<?php
     include_once 'footer.php';
?>
