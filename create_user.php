<?php
include "init.php";
include "includes/header_index.php";
?>

<?php

if(isset($_POST['create_user'])){

    $user_name = $_POST['user_name'];
    $username = $_POST['username'];

    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    $query = 'INSERT INTO users(user_name, email, username, password, role, status) ';
    $query .= "VALUES('{$user_name}','{$user_email}','{$username}','{$user_password}', '0','1')";


    $create_user_query = mysqli_query($connection, $query);

    confirm($create_user_query);

}

?>
<body>
<div class="container">
    <div class="row main">
        <div class="main-login main-center" style="    width: 400px!important;">
            <form class="form-horizontal" method="post" action="#">

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Your Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="user_name" id="name"  placeholder="Enter your Name"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Your Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Username</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <button type="submit" name="create_user" class="btn btn-primary btn-lg btn-block login-button">Register</button>
                </div>
                <div class="login-register">
                    <a href="login_page.php">Login</a>
                </div>
                <div class="login-register">
                    <a href="index.php">Home</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html>