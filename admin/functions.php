<?php



function fetchRecords($result){
    return mysqli_fetch_array($result);
}

function redirect($location){
    header("Location:" . $location);
    exit;
}

function query($query){
    global $connection;
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    return $result;
}





function get_user_name(){
    return isset($_SESSION['username']) ? $_SESSION['username'] : null;
}


function is_admin() {
    if(isLoggedIn()){
        $result = query("SELECT user_role FROM users WHERE user_id=".$_SESSION['user_id']."");
        $row = fetchRecords($result);
        if($row['user_role'] == 'admin'){
            return true;
        }else {
            return false;
        }
    }
    return false;
}


function ifItIsMethod($method=null){

    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){

        return true;

    }

    return false;

}

function isLoggedIn(){
    if(isset($_SESSION['user_role'])){
        return true;
    }
   return false;
}


function loggedInUserId(){
    if(isLoggedIn()){
        $result = query("SELECT * FROM users WHERE username='" . $_SESSION['username'] ."'");
        confirmQuery($result);
        $user = mysqli_fetch_array($result);
        return mysqli_num_rows($result) >= 1 ? $user['user_id'] : false;
    }
    return false;

}

function checkIfUserIsLoggedInAndRedirect($redirectLocation=null){
    if(isLoggedIn()){
        redirect($redirectLocation);
    }

}

function escape($string) {

global $connection;

return mysqli_real_escape_string($connection, trim($string));

}

function confirmQuery($result) {
    
    global $connection;

    if(!$result ) {
          
          die("QUERY FAILED ." . mysqli_error($connection));
      
      } 

}



function insert_categories(){
    
    global $connection;

        if(isset($_POST['submit'])){

            $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)) {
        
             echo "This Field should not be empty";
    
    } else {

    $stmt = mysqli_prepare($connection, "INSERT INTO categories(name) VALUES(?) ");

    mysqli_stmt_bind_param($stmt, 's', $cat_title);

    mysqli_stmt_execute($stmt);

        if(!$stmt) {
        die('QUERY FAILED'. mysqli_error($connection));
        
                  }    
             }
             
    mysqli_stmt_close($stmt);
   
       }

}

function insert_cout(){
    
    global $connection;

        if(isset($_POST['submit'])){

            $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)) {
        
             echo "This Field should not be empty";
    
    } else {

    $stmt = mysqli_prepare($connection, "INSERT INTO catoutcategories(name) VALUES(?) ");

    mysqli_stmt_bind_param($stmt, 's', $cat_title);

    mysqli_stmt_execute($stmt);

        if(!$stmt) {
        die('QUERY FAILED'. mysqli_error($connection));
        
                  }        
             }
          
    mysqli_stmt_close($stmt);
   
       }

}

function findAllCategories() {
global $connection;

    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_categories)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<tr>";
        
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
   echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
   echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "</tr>";

    }

}

function deleteCategories(){
global $connection;

    if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
    $delete_query = mysqli_query($connection,$query);
    header("Location: categories.php");

    }         

}

function deleteCategoriesout(){
global $connection;

    if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM catoutcategories WHERE catout_id = {$the_cat_id} ";
    $delete_query = mysqli_query($connection,$query);
    header("Location: outcat.php");

    }
           
}

function username_exists($username){

    global $connection;

    $query = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {

        return false;

    }

}

function email_exists($email){

    global $connection;


    $query = "SELECT user_email FROM users WHERE user_email = '$email'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {

        return false;

    }
}

function register_user($username, $first_name, $last_name, $email, $password){

    global $connection;

        $username   = mysqli_real_escape_string($connection, $username);
        $first_name = mysqli_real_escape_string($connection, $first_name);
        $last_name  = mysqli_real_escape_string($connection, $last_name);
        $email      = mysqli_real_escape_string($connection, $email);
        $password   = mysqli_real_escape_string($connection, $password);

        $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));
            
            
        $query = "INSERT INTO users (username, user_firstname, user_lastname, user_email, user_password, user_role) ";
        $query .= "VALUES('{$username}', '{$first_name}', '{$last_name}' ,'{$email}', '{$password}', 'user' )";
        $register_user_query = mysqli_query($connection, $query);

        confirmQuery($register_user_query);

}

 function login_user($username, $password)
 {

     global $connection;

     $username = trim($username);
     $password = trim($password);

     $username = mysqli_real_escape_string($connection, $username);
     $password = mysqli_real_escape_string($connection, $password);

     $query = "SELECT * FROM users WHERE username = '{$username}' ";
     $select_user_query = mysqli_query($connection, $query);
     if (!$select_user_query) {

         die("QUERY FAILED" . mysqli_error($connection));

     }

     while ($row = mysqli_fetch_array($select_user_query)) {

         $db_user_id = $row['user_id'];
         $db_username = $row['username'];
         $db_user_password = $row['user_password'];
         $db_user_firstname = $row['user_firstname'];
         $db_user_lastname = $row['user_lastname'];
         $db_user_role = $row['user_role'];

         if (password_verify($password,$db_user_password)) {

             $_SESSION['user_id'] = $db_user_id;
             $_SESSION['username'] = $db_username;
             $_SESSION['firstname'] = $db_user_firstname;
             $_SESSION['lastname'] = $db_user_lastname;
             $_SESSION['user_role'] = $db_user_role;

             redirect("/projektiPHP/admin");

         } else {

             return false;

         }
     }

     return true;

 }
