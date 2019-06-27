<?php
     include_once 'header.php';
?>
<section id="main-container">
    <div id="main_wrapper">
        
        <h2>Search</h2>
        <form id="signup-form" action="search.inc.php" method="POST">
            <input type="text" name="dep" placeholder="Enter Department Name">
            <button type="submit" name="submit">Search</button>
        </form>
    </div>
</section>
        
<?php
     include_once 'footer.php';
?>
