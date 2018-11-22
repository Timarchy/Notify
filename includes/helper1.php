<?php

if(isset($_GET['p_id'])){

    $the_post_id = $_GET['p_id'];

}

$query = "SELECT * FROM posts WHERE id = {$the_post_id}";
$select_posts_by_id = mysqli_query($connection, $query);




while($row = mysqli_fetch_assoc($select_posts_by_id)) {

    $post_id = $row['id'];
    $post_author = $row['author'];
    $post_title = $row['title'];
    $post_category_id = $row['category_id'];
    $post_status = $row['status'];
    $post_image = $row['image'];
    $post_content = $row['content'];
    $post_tags = $row['tags'];
    $post_comment_count = $row['comment_count'];
    $post_date = $row['date'];

}

if(isset($_POST['update_post'])){

    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['status'];

    $post_image  = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['tags'];
    $post_content = $_POST['content'];

    move_uploaded_file($post_image_temp, APPLICATION_PATH . "/images/$post_image");

    $query = "UPDATE  posts SET ";
    $query .= "title = '{$post_title}', ";
    $query .= "category_id = '{$post_category_id}', ";
    $query .= "date = now(), ";
    $query .= "author = '{$post_author}', ";
    $query .= "status = '{$post_status}', ";
    $query .= "tags = '{$post_tags}', ";
    $query .= "content = '{$post_content}', ";
    $query .= "image = '{$post_image}' ";
    $query .= "WHERE id = {$the_post_id}";

    $update_post = mysqli_query($connection,$query);

    confirm($update_post);

}




?>
