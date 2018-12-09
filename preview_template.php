<?php
include "includes/header_general.php";
?>
<?php

if(isset($_GET['id'])){
    $the_notify_id = $_GET['id'];
}

?>

<script language="JavaScript" src="embed.js"></script>
<script>
    var id = "<?php echo $the_notify_id ?>";
    var embed = new Embed(id);
</script>