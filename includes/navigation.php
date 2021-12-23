   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
           
           
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                
                <a class="navbar-brand" href="/projektiPHP/admin">BUDGET MANAGMENT</a>
            </div>
            
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav pull-right">
                  
                

                    <?php if(isLoggedIn()): ?>
                    
                    <?php if(is_admin()){ ?>


                        <li>
                            <a href="/projektiPHP/admin">Admin</a>
                        </li>
                    <?php } ?>

                        <li>
                            <a href="/projektiPHP/includes/logout.php">Logout</a>
                        </li>


                    <?php else: ?>


                        <li>
                            <a href="/projektiPHP/login.php">Login</a>
                        </li>


                   




                                 
                     <li>
                        <a href="/projektiPHP/registration.php">Registration</a>
                    </li>
                                  
                     <?php endif; ?>
  

           
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
