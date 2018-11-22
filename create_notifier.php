<?php
include "includes/header.php";
include "includes/navbar.php";
?>

<?php

if(isset($_POST['create_notif'])){

    $notif_form_resut = [];

    $label_text = $_POST['label'];
    $label_text_font_size = $_POST['label_text_fsize'];
    $label_text_color = $_POST['label_text_fcolor'];
    $label_background = $_POST['label_text_bcolor'];

    $sponsor_url = $_POST['url'];

    $summary = $_POST['summary'];
    $summary_text_font_size = $_POST['summary_font_size'];
    $summary_text_color = $_POST['summary_text_fcolor'];
    $summary_background = $_POST['summary_text_bcolor'];


    $notif_form_resut = [

        "label_text" => $label_text,
        "label_text_fsize" => $label_text_font_size,
        "label_text_color" => $label_text_color,
        "label_background" => $label_background,

        "sponsor_url" => $sponsor_url,

        "summary" => $summary,
        "summary_text_fsize" => $summary_text_font_size,
        "summary_text_color" => $summary_text_color,
        "summary_background" => $summary_background

    ];



    $current_user_id = $_SESSION['user_id'];

    $label_text = mysqli_real_escape_string($connection, $label_text);
    $sponsor_url = mysqli_real_escape_string($connection, $sponsor_url);
    $summary = mysqli_real_escape_string($connection, $summary);



    if ($label_text == '' || empty($label_text) || $sponsor_url == '' || empty($sponsor_url) || $summary == '' || empty($summary)) {
        echo "This field should not be empty";
    }else {

        $query = "INSERT INTO notifications(user_id, status, state, create_date, publish_date, modification_last)";
        $query .= "VALUES ('{$current_user_id}', '0', '1', now(), '-', '-')";

        $create_notif = mysqli_query($connection, $query);
        confirm($create_notif);


        $fpath = "/var/www/html/NotifBar/Json/";

        mkdir($fpath . mysqli_insert_id($connection), 0777);
        $fcreation = fopen("/var/www/html/NotifBar/Json/" . mysqli_insert_id($connection) . '/data.json', 'w');
        fwrite($fcreation, json_encode($notif_form_resut));
        fclose($fcreation);

    }

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

