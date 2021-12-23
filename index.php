<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

    <?php if(isLoggedIn()){
        header("Location: mybudget.php");
    }
?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>

    
 
    <!-- Page Content -->
    <div class="container">
    <center><img src="images/budget.jpg"  alt="budget">
       <h1><a class="btn btn-success" href="login.php">LOG IN</a> <a class="btn btn-primary" href="/register.php">REGISTER</a></h1></center>


   

<?php include "includes/footer.php";?>
