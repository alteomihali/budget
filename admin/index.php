<?php include "includes/admin_header.php";?>
    <div id="wrapper">

        <!-- Navigation -->
 
        <?php include "includes/admin_navigation.php" ?>
        
        <?php
                            $query= "SELECT incoming_value FROM incoming WHERE user_id={$_SESSION['user_id']}";
                           $s_query= mysqli_query($connection, $query);
                           $sumin=0;
                           while($row=mysqli_fetch_assoc($s_query)){
                               $sumin+=$row['incoming_value'];
                           }
   
                            $query= "SELECT outcoming_value FROM outcoming WHERE user_id={$_SESSION['user_id']}";
                           $s_query= mysqli_query($connection, $query);
                           $sumout=0;
                           while($row=mysqli_fetch_assoc($s_query)){
                               $sumout+=$row['outcoming_value'];
                           }

                           $total=$sumin-$sumout;
                           
                           ?>



   
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                       
                        <h1 class="page-header">
                            Miresevini,
                            
                            
                            <small> <?php 

                            if(isset($_SESSION['username'])) {

                            echo $_SESSION['username'];




                            }


                            





                            ?></small>
                        </h1>


     
                    </div>
                </div>
       
                <!-- /.row -->
                
       
                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      
                      <?php 
                                if(is_admin()){
                            
                              $query="SELECT SUM(incoming_value) AS value_sum FROM incoming";
                                }

                                else {
                                    $query="SELECT SUM(incoming_value) AS value_sum FROM incoming WHERE user_id={$_SESSION['user_id']}";

                                }
                        
                        $result = mysqli_query($connection,$query); 
                          $row = mysqli_fetch_assoc($result); 
                         $sum = $row['value_sum'];


                        

                      echo  "<div class='huge'>{$sum}</div>";

                        ?>


                        <div>Leke te marra</div>
                    </div>
                </div>
            </div>
            <a href="../mybudget.php">
                <div class="panel-footer">
                    <span class="pull-left">Shiko te Ardhurat</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                      <?php 
                                        if(is_admin()){
                                      $query="SELECT SUM(outcoming_value) AS value_sum FROM outcoming";}
                                      else {
                                        $query="SELECT SUM(outcoming_value) AS value_sum FROM outcoming WHERE user_id={$_SESSION['user_id']}";

                                      }
                              
                        
                        $result = mysqli_query($connection,$query); 
                          $row = mysqli_fetch_assoc($result); 
                         $sum = $row['value_sum'];
                            echo  "<div class='huge'>{$sum}</div>";

                                    ?>

           
                                      <div>Leke Te Harxhuara</div>
                                    </div>
                                </div>
                            </div>
                            <a href="../mybudget.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Shiko Harxhimet</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php if(is_admin()){ ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        
                                       <?php

                                        $query = "SELECT * FROM users";
                                        $select_all_users = mysqli_query($connection,$query);
                                        $user_count = mysqli_num_rows($select_all_users);

                                      echo  "<div class='huge'>{$user_count}</div>"

                                        ?>

                                       
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                                      



                        </div>
                        <?php } else{ ?>

<div class="col-lg-3 col-md-6">
<div class="panel panel-yellow">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-money fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
                
               <?php

                $query = "SELECT * FROM users";
                $select_all_users = mysqli_query($connection,$query);
                $user_count = mysqli_num_rows($select_all_users);

               echo"<div class='huge'>{$total}</div>"

                ?>

               
                <div> LEKE ne Balacen tuaj</div>
            </div>
        </div>
    </div>
    <a href="../mybudget.php">
        <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
        </div>
    </a>
              



</div>








                      <?php  }
                         ?>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                     <?php 

                                    $query = "SELECT * FROM categories";
                                    $select_all_categories = mysqli_query($connection,$query);
                                    $category_count = mysqli_num_rows($select_all_categories);
                                            
                                         $query = "SELECT * FROM catoutcategories";
                                    $select_all_categories = mysqli_query($connection,$query);
                                    $category_count2 = mysqli_num_rows($select_all_categories);
                                        $category_count+=$category_count2;
                                  echo  "<div class='huge'>{$category_count}</div>"

                                    ?>

                                   <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
       
            <!-- /.container-fluid -->

        </div>
        
    
        <!-- /#page-wrapper -->
        
    <?php include "includes/admin_footer.php" ?>

        




