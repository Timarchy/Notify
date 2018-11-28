<?php

include "includes/header_general.php";

?>



<?php

if(isset($_GET['id'])){
    $the_notify_id = $_GET['id'];
}

$query = "SELECT * FROM notifications WHERE id = {$the_notify_id}";

$selected_post_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($selected_post_by_id)){

    //working data from database
    $template_id = $row['id'];
    $user_id = $row['user_id'];
    $template_state = $row['state'];
    $template_creation_date = $row['create_date'];
    $template_modification = $row['modification_last'];
    $template_published = $row['publish_date'];

}


if(isset($_POST['edit_notif'])){

    $notif_edit_form_resut = [];

    //working data from form
    $label_text = $_POST['label'];
    $label_text_font_size = $_POST['label_text_fsize'];
    $label_text_color = $_POST['label_text_fcolor'];
    $label_background = $_POST['label_text_bcolor'];

    $sponsor_url = $_POST['url'];

    $summary = $_POST['summary'];
    $summary_text_font_size = $_POST['summary_font_size'];
    $summary_text_color = $_POST['summary_text_fcolor'];
    $summary_background = $_POST['summary_text_bcolor'];

    // store data for json file
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

    //secure inserted data to prevent sql injections
    $label_text = mysqli_real_escape_string($connection, $label_text);
    $sponsor_url = mysqli_real_escape_string($connection, $sponsor_url);
    $summary = mysqli_real_escape_string($connection, $summary);

    // check if fields not empty then proceed
    if ($label_text == '' || empty($label_text) || $sponsor_url == '' || empty($sponsor_url) || $summary == '' || empty($summary)) {
        echo "Fields should not be empty";
    }else {
        //update notifier into database table
        $query = "UPDATE notifications SET ";
        $query .= "user_id = '{$user_id}', ";
        $query .= "status = '0', ";
        $query .= "state = '1', ";
        $query .= "create_date = '{$template_creation_date}', ";
        $query .= "modification_last = now() WHERE id = {$the_notify_id}";

        $update_notif = mysqli_query($connection, $query);
        confirm($update_notif);


        // overwrite the existing json file
        $fpath = "/var/www/html/NotifBar/Json/" . $the_notify_id . "/data.json";
        $encodedData = json_encode($notif_edit_form_resut);
        file_put_contents($fpath, $encodedData);

//        mkdir($fpath . $the_notify_id, 0777);  // JSON ID MATTER HERE IF BUG LINKED TO PATH ID <============================= HERE
//        $fcreation = fopen("/var/www/html/NotifBar/Json/" . $template_id . '/data.json', 'w');
//        fwrite($fcreation, json_encode($notif_edit_form_resut));
//        fclose($fcreation);

    }

}



?>


<!--create and edit form for notifier-->
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="form_main">
                <h4 class="heading"><strong>Create</strong> Notifier <span></span></h4>
                <div class="form">
                    <form method="post" id="contactFrm" name="contactFrm">
                        <input type="text" required="" placeholder="Label text" value="" id="labelText" name="label" class="txt">
                        <select name="label_text_fsize" id="label_font_size" value="" style="margin-bottom: 10px;">
                            <!-- loop the given f-sizes -->
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
                            <span id="labelTextColor"></span>
                        </div>
                        <div>
                            <input type="color" id="label_background" name="label_text_bcolor" value="#ffffff">
                            <label for="head">Label-background</label>
                            <span id="colorTextBground"></span>
                        </div>


                        <input type="text" id="sponsor_url" required="" placeholder="Sponsor's link" value="" name="url" class="txt">


                        <textarea required="" id="summary" placeholder="Demo summary" name="summary" type="text" class="txt_3"></textarea>
                        <select name="summary_font_size" id="summary_font_size" value="" style="margin-bottom: 10px;">
                            <!-- loop the given f-sizes -->
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
                            <span id="colorBackSummary"></span>
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
    // storing the value of te current logged user ( already saved in a $_SESSIONS the in a PHP variable)
    var notificationId = "<?php echo $the_notify_id ?>";

    //selection the needed divs to latter target for populating with the wanted style and data
    var labelText = document.getElementById('labelText');
    var label_text_fsize = document.getElementById('label_font_size');
    var label_text_color = document.getElementById('label_text_color');
    var label_background = document.getElementById('label_background');
    var sponsor_url = document.getElementById('sponsor_url');
    var summary = document.getElementById('summary');
    var summary_text_fsize = document.getElementById('summary_font_size');
    var summary_text_color = document.getElementById('summaryTextColor');
    var summary_background = document.getElementById('summary_text_bcolor');

    var colorTextBground = document.getElementById("colorTextBground");
    var labelTextColor = document.getElementById("labelTextColor");
    var summaryTextColor = document.getElementById('summaryTextColor');
    var colorSummary = document.getElementById('colorSummary');
    var summary_text_bcolor = document.getElementById("summary_text_bcolor");
    var colorBackSummary = document.getElementById("colorBackSummary");


    // requests existing data from json file to populate the edit page with the current notifier to edit
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


    // for the color picker: display the hexadecimal code for the color picked - needs work to display it right after selecting it

    // declared above // var label_text_color = document.getElementById("label_text_color");
    label_text_color.addEventListener('focusout', function() {
        labelTextColor.innerText = label_text_color.value;
        labelTextColor.setAttribute("style", "border: solid 1px grey;padding: 4px 8px;border-radius: 3px;")
    });

    // declared above // var label_background = document.getElementById("label_background");
    label_background.addEventListener('focusout', function() {
        colorTextBground.innerText = label_background.value;
        colorTextBground.setAttribute("style", "border: solid 1px grey;padding: 4px 8px;border-radius: 3px;")
    });

    summaryTextColor.addEventListener('focusout', function() {
        colorSummary.innerText = summaryTextColor.value;
        colorSummary.setAttribute("style", "border: solid 1px grey;padding: 4px 8px;border-radius: 3px;")
    });

    summary_text_bcolor.addEventListener('focusout', function() {
        colorBackSummary.innerText = summary_text_bcolor.value;
        colorBackSummary.setAttribute("style", "border: solid 1px grey;padding: 4px 8px;border-radius: 3px;")
    });



</script>