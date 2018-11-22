<?php

include "includes/header.php";

?>



<?php

if(isset($_GET['id'])){
    $the_notify_id = $_GET['id'];
}

$query = "SELECT * FROM notifications WHERE id = {$the_notify_id}";

$selected_post_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($selected_post_by_id)){

    $template_id = $row['id'];
    $user_id = $row['user_id'];
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


    $current_user_id = $_SESSION['user_id'];


    $label_text = mysqli_real_escape_string($connection, $label_text);
    $sponsor_url = mysqli_real_escape_string($connection, $sponsor_url);
    $summary = mysqli_real_escape_string($connection, $summary);


    if ($label_text == '' || empty($label_text) || $sponsor_url == '' || empty($sponsor_url) || $summary == '' || empty($summary)) {
        echo "Fields should not be empty";
    }else {

        $query = "UPDATE notifications WHERE id = {$the_notify_id} SET ";
        $query .= "user_id = '{$user_id}', ";
        $query .= "status = '0', ";
        $query .= "state = '1', ";
        $query .= "create_date = '{$template_creation_date}', ";
        $query .= "publish_date = now(), ";
        $query .= "modification_last = now()";

        $update_notif = mysqli_query($connection, $query);
        confirm($update_notif);


        $fpath = "/var/www/html/NotifBar/Json/";

        mkdir($fpath . $the_notify_id, 0777);  // JSON ID MATTER HERE IF BUG LINKED TO PATH ID <============================= HERE
        $fcreation = fopen("/var/www/html/NotifBar/Json/" . $template_id . '/data.json', 'w');
        fwrite($fcreation, json_encode($notif_edit_form_resut));
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
                        <input type="text" required="" placeholder="Label text" value="" id="labelText" name="label" class="txt">
                        <select name="label_text_fsize" id="label_font_size" value="" style="margin-bottom: 10px;">
                            <?php
                            $fonts = ["14px", "16px", "18px", "20px"];

                            forEach($fonts as $font) {
                                echo "<option value= '{$font}'>$font</option>";

                            }
                            ?>
                        </select>
                        <div>
                            <input type="color" id="label_text_color" name="label_text_fcolor" value="#5b5b5b">
                            <label for="head">Label-text</label>
                        </div>
                        <div>
                            <input type="color" id="label_background" name="label_text_bcolor" value="#ffffff">
                            <label for="head">Label-background</label>
                        </div>


                        <input type="text" id="sponsor_url" required="" placeholder="Sponsor's link" value="" name="url" class="txt">


                        <textarea required="" id="summary" placeholder="Demo summary" name="summary" type="text" class="txt_3"></textarea>
                        <select name="summary_font_size" id="summary_font_size" value="" style="margin-bottom: 10px;">
                            <?php
                            $fonts = ["12px", "14px", "16px"];

                            forEach($fonts as $font) {
                                echo "<option value= '{$font}'>$font</option>";

                            }
                            ?>
                        </select>
                        <div>
                            <input type="color" id="summaryTextColor" name="summary_text_fcolor" value="#000000">
                            <label for="head">Summary</label>
                            <span id="colorSummary"></span>
                        </div>
                        <div>
                            <input type="color" id="summary_text_bcolor" name="summary_text_bcolor" value="#dbd1d1">
                            <label for="head">Background</label>
                        </div>


                        <a href="notifications.php">
                            <input type="submit" value="Save" name="edit_notif" class="txt2">
                        </a>
                    </form>
                    <div><a href="index.php">HOME</a></div>
                </div>
            </div>
        </div
    </div>
</div>

<script>
    var notificationId = "<?php echo $the_notify_id ?>";

    var labelText = document.getElementById('labelText');
    var label_text_fsize = document.getElementById('label_font_size');
    var label_text_color = document.getElementById('label_text_color');
    var label_background = document.getElementById('label_background');
    var sponsor_url = document.getElementById('sponsor_url');
    var summary = document.getElementById('summary');
    var summary_text_fsize = document.getElementById('summary_font_size');
    var summary_text_color = document.getElementById('summaryTextColor');
    var summary_background = document.getElementById('summary_text_bcolor');


    var xhr = new XMLHttpRequest();
    var url = "./Json/" + notificationId + "/data.json";
    xhr.open("GET", url, true);

    xhr.onloadend = function() {
        var parsedJSON = JSON.parse(xhr.responseText);
        console.log(parsedJSON);
        if ( xhr.status === 200) {
            labelText.value = parsedJSON.label_text;
            console.log(parsedJSON.label_text);

            label_text_fsize.value = parsedJSON.label_text_fsize;
            label_text_color.value = parsedJSON.label_text_color;
            label_background.value = parsedJSON.label_background;
            sponsor_url.value = parsedJSON.sponsor_url;
            summary.value = parsedJSON.summary;
            summary_text_fsize.value = parsedJSON.summary_text_fsize;
            summary_text_color.value = parsedJSON.summary_text_color;
            summary_background.value = parsedJSON.summary_background;
        }
    };

    xhr.send();




    var colorSummary = document.getElementById('colorSummary');
    var summaryTextColor = document.getElementById('summaryTextColor');

    summaryTextColor.addEventListener('focusout', function() {
        colorSummary.innerText = summaryTextColor.value;
    })

</script>