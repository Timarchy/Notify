<?php

if(isset($_GET['n_id'])){
    $the_notify_id = $_GET['n_id'];
}

$query = "SELECT * FROM notifications WHERE id = {$the_notify_id}";
$selected_post_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($selected_post_by_id)){

    $template_id = $row['id'];
    $template_state = $row['state'];
    $template_creation_date = $row['create_date'];
    $template_modification = $row['modification_last'];
    $template_published = $row['publish_date'];

}

if(isset($_POST['edit_notif'])){

    $notif_edit_form_resut = [];

    $label_text = $_POST['label'];
    $label_text_font_size = $_POST['label_text_fsize'];
    $label_text_color = $_POST['label_text_fcolor'];
    $label_background = $_POST['label_text_bcolor'];

    $sponsor_url = $_POST['url'];

    $summary = $_POST['summary'];
    $summary_text_font_size = $_POST['summary_font_size'];
    $summary_text_color = $_POST['summary_text_fcolor'];
    $summary_background = $_POST['summary_text_bcolor'];


    $notif_edit_form_resut = [

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
                        <select name="label_text_fsize" id="label_font_size" value="" style="margin-bottom: 10px;">
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

                        <select name="summary_font_size" id="summary_font_size" value="" style="margin-bottom: 10px;">
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



                        <input type="submit" value="Save" name="edit_notif" class="txt2">
                    </form>
                    <div><a href="index.php">HOME</a></div>
                </div>
            </div>
        </div
    </div>
</div>

<!--<div class="container">-->
<!--    <form id="contact" action="" method="post">-->
<!--        <h3>Create Notifier</h3>-->
<!--        </br>-->
<!--        <fieldset>-->
<!--            <input placeholder="Label Title" type="text" tabindex="1" required autofocus>-->
<!--        </fieldset>-->
<!--        <fieldset>-->
<!--            <input placeholder="Label font size" type="text" tabindex="2" required autofocus>-->
<!--        </fieldset>-->
<!--        <fieldset>-->
<!--            <input placeholder="Label font color" type="text" tabindex="3" required autofocus>-->
<!--        </fieldset>-->
<!--        <fieldset>-->
<!--            <input placeholder="Label background color" type="text" tabindex="4" required autofocus>-->
<!--        </fieldset>-->
<!--        </br>-->
<!--        <fieldset>-->
<!--            <input placeholder="Sponsor's URL" type="url" tabindex="8" required>-->
<!--        </fieldset>-->
<!--        </br>-->
<!--        <fieldset>-->
<!--            <textarea placeholder="Type summary here...." tabindex="9" required></textarea>-->
<!--        </fieldset>-->
<!--        <fieldset>-->
<!--            <input placeholder="Summary font size" type="text" tabindex="5" required autofocus>-->
<!--        </fieldset>-->
<!--        <fieldset>-->
<!--            <input placeholder="Summary font color" type="text" tabindex="6" required>-->
<!--        </fieldset>-->
<!--        <fieldset>-->
<!--            <input placeholder="Summary background color" type="text" tabindex="7" required>-->
<!--        </fieldset>-->
<!--        <fieldset>-->
<!--            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>-->
<!--        </fieldset>-->
<!--    </form>-->
<!--</div>-->