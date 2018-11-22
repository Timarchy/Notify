<?php

if(isset($_GET['delete'])){

    echo 'Supp';

    $the_post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE id = {$the_post_id} ";
    $delete_query = mysqli_query($connection, $query);

}




$query = 'SELECT * FROM posts';
$select_posts = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_posts)) {

    $post_id = $row['id'];
    $post_author = $row['author'];
    $post_title = $row['title'];
    $post_category_id = $row['category_id'];
    $post_status = $row['status'];
    $post_image = $row['image'];
    $post_tags = $row['tags'];
    $post_comment_count = $row['comment_count'];
    $post_date = $row['date'];

    echo "<tr>";
    echo "<td>$post_id</td>";
    echo "<td>$post_author</td>";
    echo "<td>$post_title</td>";

    $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
    $select_categories_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_categories_id)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<td>{$cat_title}</td>";

    }

    echo "<td>$post_status</td>";
    echo "<td><img style='width:100px;' src='../images/$post_image'></td>";
    echo "<td>$post_tags</td>";
    echo "<td>$post_comment_count</td>";
    echo "<td>$post_date</td>";
    echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
    echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
    echo "</tr>";

}

?>


<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="form_main">
                <h4 class="heading"><strong>Create</strong> Notifier <span></span></h4>
                <div class="form">
                    <form method="post" id="contactFrm" name="contactFrm">
                        <input type="text" required="" placeholder="Label text" value="" name="label" class="txt">
                        <select name="label_text_fsize" id="label_font_size" style="margin-bottom: 10px;">
                            <?php
                            $fonts = ["14px", "16px", "18px", "20px"];

                            forEach($fonts as $font) {
                                echo "<option value= '{$font}'>$font</option>";

                            }
                            ?>
                        </select>
                        <div>
                            <input type="color" id="" name="label_text_fcolor" value="#5b5b5b">
                            <label for="head">Labe-text</label>
                        </div>
                        <div>
                            <input type="color" id="" name="label_text_bcolor" value="#ffffff">
                            <label for="head">Label-background</label>
                        </div>


                        <input type="text" required="" placeholder="Sponsor's link" value="" name="url" class="txt">

                        <textarea required="" placeholder="Demo summary" name="summary" type="text" class="txt_3"></textarea>

                        <select name="summary_font_size" id="summary_font_size" style="margin-bottom: 10px;">
                            <?php
                            $fonts = ["12px", "14px", "16px"];

                            forEach($fonts as $font) {
                                echo "<option value= '{$font}'>$font</option>";

                            }
                            ?>
                        </select>
                        <div>
                            <input type="color" id="" name="summary_text_fcolor" value="#000000">
                            <label for="head">Summary</label>
                        </div>
                        <div>
                            <input type="color" id="" name="summary_text_bcolor" value="#dbd1d1">
                            <label for="head">Background</label>
                        </div>



                        <input type="submit" value="Save" name="create_notif" class="txt2">
                    </form>
                    <div><a href="index.php">HOME</a></div>
                </div>
            </div>
        </div
    </div>
</div>
