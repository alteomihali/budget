       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                
                <a class="navbar-brand" href="index.php">Kreu</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

               <li><a href="../index.php">Blloku</a></li>
               
               
               
    
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                    
                    <?php

                    if(isset($_SESSION['username'])) {


                        echo $_SESSION['username'];


                    }

                    ?>

                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                           
                           
                           
                            <a href="./profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Kreu</a>
                    </li>

                   
                
                     <li>
                        <a href="../mybudget.php" ><i class="fas fa-money-bill-wave-alt"></i>Blloku </a>
                        
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Kategorite <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="outcat.php">Kategori Shpenzimesh</a>
                            </li>
                            <li>
                                <a href="categories.php">Kategori Te Ardhurash</a>
                            </li>
                        </ul>
                    </li>

                    <?php if (is_admin()){ ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-v"></i> Perdoruesit <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="users.php">Shikoi te gjithe</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">Shto perdorues</a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Profili</a>
                    </li>
                    
                    
                    
                </ul>
            </div>
            
            
            
            <!-- /.navbar-collapse -->
        </nav>
        