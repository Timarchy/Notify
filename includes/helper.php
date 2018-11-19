<?php


if ($cat_title == '' || empty($cat_title)) {
    echo "This field should not be empty";
} else {
    $query = 'INSERT INTO categories(cat_title)';
    $query .= "VALUE('{$cat_title}')";

    $create_category_query = mysqli_query($connection, $query);
    if (!$create_category_query) {
        die('QUERY FAILED' . mysqli_error($connection));
    }
}



if(isset($_POST['create_post'])){

    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['status'];

    $post_image  = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['tags'];
    $post_content = $_POST['content'];
    $post_date = date('d-m-y');
    // $post_comment_count = 4;




    $result = move_uploaded_file($post_image_temp, APPLICATION_PATH . "/images/$post_image");

    $query = 'INSERT INTO posts(category_id, title, author, date, image, content, tags, status) ';
    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";

    $create_post_query = mysqli_query($connection, $query);

    confirm($create_post_query);

}

?>