<?php require("connection.php");
session_start();
if (!isset($_SESSION["email"])) {
    header("location:login.php");
    exit();
}
?>

<?php
$url =$_SESSION['url'];
$id = $_REQUEST["id"];
$delete_query = "DELETE FROM ads WHERE id='$id'";
$fire_query = $conn->query($delete_query);

header("Location:$url");

exit();
mysqli_close($connection);
?>