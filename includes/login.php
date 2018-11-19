
<?php

/*if(isset($_POST['login'])){

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

        header("Location: ../index.php");

    }elseif ($username == $db_username && $password == $db_user_password){

        echo "USER FOUND!";

        $_SESSION['username'] = $db_username;
        $_SESSION['user_name'] = $db_user_name;
        $_SESSION['role'] = $db_user_role;
        $_SESSION['user_id'] = $db_user_id;

        header( "Location: ../index.php");

    }else{
        echo "Something happening";
        header("Location: ../index.php");
    }



}*/

?>
