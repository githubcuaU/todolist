<?php include("header.php") ?>
<h2>Error</h2>
<br>
<p><?php echo $error_message ?></p>

<?php
$goBack = htmlspecialchars($_SERVER['HTTP_REFERER']);
echo "<a href='$goBack'>Go back to task list</a>";
?>

<?php include("footer.php") ?>