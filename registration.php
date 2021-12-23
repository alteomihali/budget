<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php


$options = array(
    'cluster' => 'us2',
    'encrypted' => true
);

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = trim($_POST['username']);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);


    $error = [

        'username'=> '',
        'email'=>'',
        'password'=>''

    ];


    if(strlen($username) < 4){

        $error['username'] = 'Username shume i shkurter <4';


    }

     if($username ==''){

        $error['username'] = 'Username nuk mund te lihet bosh';


    }


     if(username_exists($username)){

        $error['username'] = 'Username ekziston, zgjidhni nje tjeter';


    }



    if($email ==''){

        $error['email'] = 'Email nuk mund te lihet i zbrazet';


    }


     if(email_exists($email)){

        $error['email'] = 'Email ekziston, <a href="index.php">Login</a>';


    }


    if($password == '') {


        $error['password'] = 'Password nuk mund lihet bosh';

    }



    foreach ($error as $key => $value) {
        
        if(empty($value)){

            unset($error[$key]);

        }



    } // foreach

    if(empty($error)){

        register_user($username, $first_name, $last_name, $email, $password);

        login_user($username, $password);


    }

    

} 


?>


<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>



<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">


                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" autocomplete="on" value="<?php echo isset($username) ? $username : '' ?>">

                                <p>
                                    <?php echo isset($error['username']) ? $error['username'] : '' ?>
                                </p>


                            </div>
                            <div class="form-group">
                                <label for="first_name" class="sr-only">first_name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter Your Name" autocomplete="on" value="<?php echo isset($first_name) ? $first_name : '' ?>">

                            </div>

                            <div class="form-group">
                                <label for="last_name" class="sr-only">last_name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Your Lastname" autocomplete="on" value="<?php echo isset($last_name) ? $last_name : '' ?>">


                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" autocomplete="on" value="<?php echo isset($email) ? $email : '' ?>">

                                <p>
                                    <?php echo isset($error['email']) ? $error['email'] : '' ?>
                                </p>

                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password">

                                <p>
                                    <?php echo isset($error['password']) ? $error['password'] : '' ?>
                                </p>


                            </div>

                            <input type="submit" name="resgister" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php";?>