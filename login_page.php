<?php

include "includes/header.php";

?>

<?php

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $select_user_query = mysqli_query($connection, $query);

    if(!$select_user_query){
        die("QUERY FAILED" . mysqli_error($connection));
    }


    while($row = mysqli_fetch_array($select_user_query)){

        $db_user_id = $row['id'];
        $db_username = $row['username'];
        $db_user_password = $row['password'];
        $db_user_name = $row['user_name'];
        $db_user_role = $row['role'];

    }

    if($username !== $db_username && $password !== $db_user_password){
        echo "User not found!";

        header("Location: login_page.php");

    }elseif ($username == $db_username && $password == $db_user_password){

        echo "USER FOUND!";

        $_SESSION['username'] = $db_username;
        $_SESSION['user_name'] = $db_user_name;
        $_SESSION['role'] = $db_user_role;
        $_SESSION['user_id'] = $db_user_id;

        header( "Location: index.php");

    }else{
        echo "Something happening";

        header("Location: login_page.php");
    }



}

?>

<body id="LoginForm">
<div class="container">
    <a class="nav-link" href="index.php">
        <h1 class="form-heading" style="text-align: center">
            N.S
            <span style="font-size: 15px;">home</span>
        </h1>
    </a>
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Admin Login</h2>
                <p>Please enter your email and password</p>
            </div>
            <form id="Login" method="post">

                <div class="form-group">

                    <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username">

                </div>

                <div class="form-group">

                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">

                </div>
                <div class="forgot">
                    <a href="reset.html">Forgot password?</a>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Login</button>
                <div class="forgot">
                    <a href="create_user.php">New here? REGISTER NOW!</a>
                </div>

            </form>
        </div>
        <p class="botto-text"> Designed by not Timi</p>
    </div>
</div>


</body>
</html>
