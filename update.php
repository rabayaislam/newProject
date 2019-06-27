<?php
     include_once 'header.php';
?>
        
<section id="main-container">
    <div id="main_wrapper">
        <h2>Update Your INFO</h2>
        <form id="signup-form" action="update.inc.php" method="POST">
            <input type="text" name="roll_no" placeholder="Roll NO">
            <input type="text" name="first_name" placeholder="First Name">
            <input type="text" name="last_name" placeholder="Last Name">
            <input type="text" name="department" placeholder="Department">
            <input type="text" name="batch" placeholder="Batch">
            <input type="text" name="phone" placeholder="Phone">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="submit1">Update</button>
            <button type="submit" name="submit2">Go Back</button>
        </form>
    </div>
</section>
        
<?php
     include_once 'footer.php';
?>


