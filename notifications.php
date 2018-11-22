<?php

include "includes/header.php";
include "includes/navbar.php";

?>

<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Created</th>
        <th>State</th>
        <th>Updated</th>
        <th>Published</th>

    </tr>
    </thead>
    <tbody>

    <?php

    // DELETE POST
   /* if(isset($_GET['delete'])){

        echo 'Supp';

        $the_post_id = $_GET['delete'];

        $query = "DELETE FROM posts WHERE id = {$the_post_id} ";
        $delete_query = mysqli_query($connection, $query);

    }*/



    $current_user_id = $_SESSION['user_id'];
//    var_dump($current_user_id);

    $query = "SELECT * FROM notifications WHERE user_id = {$current_user_id}";
    $select_template = mysqli_query($connection, $query);
//    var_dump($query);


    while($row = mysqli_fetch_assoc($select_template)) {

        $template_id = $row['id'];
        $template_state = $row['state'];
        $template_creation_date = $row['create_date'];
        $template_modification = $row['modification_last'];
        $template_published = $row['publish_date'];

        //  CONTENT NEEDED FROM JSON

        echo "<tr>";
        echo "<td>$template_id</td>";
        echo "<td>$template_creation_date</td>";

        switch ($template_state) {
            case "0":
                echo "<td>Inactive</td>";
                break;
            case "1":
                echo "<td>Pending</td>";
                break;
            case "2":
                echo "<td>Active</td>";
                break;
            case "3":
                echo "<td>Deleted</td>";
                break;
        }

        echo "<td>$template_modification</td>";
        echo "<td>$template_published</td>";
        echo "<td>Edit</td>";
        echo "<td>Delete</td>";

        echo "<tr>";



    }
    ?>

    </tbody>
</table>
