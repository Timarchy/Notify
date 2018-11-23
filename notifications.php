<?php

include "includes/header.php";
include "includes/navbar.php";

?>
<style type="text/css">
    body{
        height:unset!important;
    }
</style>
<div id="page_wrapper">
    <div class="container_fluid">
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

            if(isset($_GET['delete'])){

                echo 'Supp';

                $the_notif_id = $_GET['delete'];

                $query = "DELETE FROM notifications WHERE id = {$the_notif_id} ";
                $delete_query = mysqli_query($connection, $query);

            }



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
                echo "<td><a href='edit_notifie.php?id={$template_id}'>Edit</a></td>";
                echo "<td><a href='notifications.php?delete={$template_id}'>Delete</a></td>";

                echo "<tr>";



            }
            ?>

            </tbody>
        </table>
    </div>
</div>
