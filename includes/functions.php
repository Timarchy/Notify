<?php

function confirm($result){

    global $connection;

    if(!$result){
        die("QUERY FAILED ." . mysqli_error($connection));
    }else {
        echo "GOOD TO GO!!!";
    }

}

?>