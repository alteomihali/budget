<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

    <?php if(!isLoggedIn()){
        header("Location: index.php");
    }
?>
    

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
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

                           
                           
                           ?>
    
 
    <!-- Page Content -->
    <div class="container">
       <h1 style="text-align:center">BALANCE: <?php echo $sumin-$sumout; ?> </h1>
       
       
        <div class="col-lg-6 col-md-6">
            <table class="table table-bordered table-hover">
               <thead>
                  <tr>
                  <th>Incoming Name</th>
                   <th>Incoming Value</th>
                   <th> Kategoria</th>
                   <th>EDIT</th>
                   <th>DELETE</th>
                    
                </tr> 
               </thead>
               
               <tbody>
                   
                       <?php
                  
                    $query="SELECT * FROM incoming WHERE user_id = {$_SESSION['user_id']}";
                    $s_query=mysqli_query($connection, $query);
                       
                       while($row=mysqli_fetch_assoc($s_query)){
                           $incoming_id=$row['incoming_id'];
                           $incoming_name=$row['incoming_name'];
                           $incoming_value=$row['incoming_value'];
                           $incoming_cat=$row['cat_id'];
                           echo "<tr>";
                           
                           if(isset($_GET['editin']) && $incoming_id==$_GET['editin']){
                               
                               ?>
                               <form action="" method="post">
                               <input hidden type="text" name="id" value="<?php echo $_GET['editin']; ?>">
                               <td><input type="text" name="name" value="<?php echo $incoming_name; ?>"></td>
                               <td><input type="text" name="value" value="<?php echo $incoming_value; ?>"></td>
                               <td><input type="submit" class="btn btn-success" name="updatein" value="update"></td>
                               </form>
                               <?php 
                           } else{
                          
                           echo "<td>$incoming_name</td>";
                           echo "<td>$incoming_value</td>";
                           $query1="SELECT name from categories where cat_id=$incoming_cat";
                           $exquery= mysqli_query($connection,$query1);
                           $fetchdata=mysqli_fetch_assoc($exquery);
                           $emring=$fetchdata['name'];
                           echo "<td>$emring</td>";
                           
                           
                           echo "<td><a class='btn btn-info' href='mybudget.php?editin={$incoming_id}'>Edit</a></td>";
                           }
                           
                           echo "<td><a class='btn btn-danger' href='mybudget.php?delete={$incoming_id}'>Delete</a></td>";
                           echo "</tr>";
                       }
                       
                       ?>
                       <tr>
                       <td><b>Total</b></td>
                       <td>
                           <?php
                           echo $sumin;

                           ?>
                           
                           
                       </td>
                   </tr>
                   
               </tbody>
                
                
            </table>
            
              <?php   
            if(isset($_GET['addin'])){
                
                 ?> 
                 <form action="" method="post">
                     Incoming Name: <input type="text" required name="name" placeholder="enter the name"><br>
                     Incoming Value: <input type="text" required name="value" placeholder="enter the value"><br>
                     Kategoria :


 
<?php 
$sql = mysqli_query($connection,"SELECT * FROM categories");

?>





<select name ="kategoria">

            <?php while($row1 = mysqli_fetch_array($sql)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>

        </select><br>








                    <input type="submit" class="btn btn-success" name="submitin" value="submit">
                     
                 </form>

                 
                  
                    <?php
            } else{ ?>
            
             <a href="mybudget.php?addin" class="btn btn-success">ADD</a>
             <?php } ?>
        </div>
        
                <div class="col-lg-6 col-md-6">
            <table class="table table-bordered table-hover">
               <thead>
                  <tr>
                  <th>Outcoming Name</th>
                   <th>Outcoming Value</th>
                   <th>Kategoria</th>
                    <th>EDIT</th>
                   <th>DELETE</th>
                </tr> 
               </thead>
               
               <tbody>
                   <?php
                    $query="SELECT * FROM outcoming WHERE user_id = {$_SESSION['user_id']}";
                    $s_query=mysqli_query($connection, $query);
                       
                       while($row=mysqli_fetch_assoc($s_query)){
                           $outcoming_id=$row['outcoming_id'];
                           $outcoming_name=$row['outcoming_name'];
                           $outcoming_value=$row['outcoming_value'];
                           $outcat_cat=$row['outcat_id'];
                           echo "<tr>";
                           
                           if(isset($_GET['editout']) && $outcoming_id==$_GET['editout']){
                               ?>
                               <form action="" method="post">
                               <input hidden type="text" name="id" value="<?php echo $_GET['editout']; ?>">
                               <td><input type="text" name="name" value="<?php echo $outcoming_name; ?>"></td>
                               <td><input type="text" name="value" value="<?php echo $outcoming_value; ?>"></td>
                               <td><input type="submit" class="btn btn-success" name="updateout" value="update"></td>
                               </form>
                               <?php  } else{
                           
                           echo "<td>$outcoming_name</td>";
                           echo "<td>$outcoming_value</td>";
                           $query1="SELECT name from catoutcategories where  catout_id=$outcat_cat";
                           $exquery= mysqli_query($connection,$query1);
                           $fetchdata=mysqli_fetch_assoc($exquery);
                           $emring=$fetchdata['name'];
                           echo "<td>$emring</td>";



                           echo "<td><a class='btn btn-info' href='mybudget.php?editout={$outcoming_id}'>Edit</a></td>";
                           }
                           echo "<td><a class='btn btn-danger' href='mybudget.php?deleteout={$outcoming_id}'>Delete</a></td>";
                           echo "</tr>";
                       }
                       
                       ?>
                       
                       <tr>
                       <td><b>Total</b></td>
                       <td>
                           <?php
                           echo $sumout;

                           
                           ?>
                           
                       </td>
                   </tr>
                   
               </tbody>
                
                
            </table>
          <?php   
            if(isset($_GET['add'])){
                
                 ?> 
                 <form action="" method="post">
                     Outcoming Name: <input type="text" name="name" placeholder="enter the name"><br>
                     Outcoming Value: <input type="text" name="value" placeholder="enter the value"><br>
                    Kategoria: 
                     

                    <?php 
$sql = mysqli_query($connection,"SELECT * FROM catoutcategories");


?>



                

<select name ="kategoriaout">

            <?php while($row1 = mysqli_fetch_array($sql)):;?>

            <option value="<?php echo $row1[0];?>"><?php  echo $row1[1];?></option>

            <?php endwhile;?>

        </select><br>


            



                    <input type="submit" class="btn btn-success" name="submitout" value="submit">
                     
                 </form>
                  
                    <?php
            } else{ ?>
            
             <a href="mybudget.php?add" class="btn btn-success">ADD</a>
             <?php } ?>
             
        </div>
        
        
        
        <?php
            if(isset($_GET['delete'])){
            $delete = $_GET['delete'];

                $query= "DELETE FROM incoming WHERE incoming_id={$delete}";
                $d_query=mysqli_query($connection, $query);
                
                redirect("mybudget.php");
            }

             if(isset($_GET['deleteout'])){
            $delete = $_GET['deleteout'];

                $query= "DELETE FROM outcoming WHERE outcoming_id={$delete}";
                $d_query=mysqli_query($connection, $query);
                
                redirect("mybudget.php");
            }
        
        if(isset($_POST['submitout'])){
            $name = $_POST['name'];
            $value = $_POST['value'];
            $user_id=$_SESSION['user_id'];
            $kategoria=$_POST['kategoriaout'];
            
             if(empty($name)){
                 
             } else
                 if(empty($name)){
                 } else{
            



                $query= "INSERT INTO outcoming (outcoming_name, outcoming_value, user_id, outcat_id) VALUES('{$name}', {$value}, {$user_id}, $kategoria)";
                $d_query=mysqli_query($connection, $query);
                
                redirect("mybudget.php");
            }
        }
        
        if(isset($_POST['submitin'])){
            $name = $_POST['name'];
            $value = $_POST['value'];
            $user_id=$_SESSION['user_id'];
            $kategoria=$_POST['kategoria'];
            $datas= date("Y-M-D");
             if(empty($name)){
                 
             } else
                 if(empty($name)){
                 } else{

    
                $query= "INSERT INTO incoming (incoming_name, incoming_value, user_id, cat_id, data) VALUES('{$name}', {$value}, {$user_id}, '{$kategoria}', '{$datas}')";
                $d_query=mysqli_query($connection, $query);
                
                redirect("mybudget.php");
            }
        }
         if(isset($_POST['updatein'])){
             $incoming= $_POST['id'];
            $name = $_POST['name'];
            $value = $_POST['value'];
             
             if(empty($name)){
                 
             } else
                 if(empty($name)){
                 } else{

                $query= "UPDATE incoming SET incoming_name='{$name}', incoming_value={$value} WHERE incoming_id={$incoming}";
                $d_query=mysqli_query($connection, $query);
                
                redirect("mybudget.php");
            }
         }
        if(isset($_POST['updateout'])){
            $outcoming= $_POST['id'];
            $name = $_POST['name'];
            $value = $_POST['value'];
            
            if(empty($name)){
                 
             } else
                 if(empty($name)){
                 } else{

                $query= "UPDATE outcoming SET outcoming_name='{$name}', outcoming_value={$value} WHERE outcoming_id={$outcoming}";
                $d_query=mysqli_query($connection, $query);
                
                redirect("mybudget.php");
            }
        }
        
        ?>

<?php include "includes/footer.php";?>

