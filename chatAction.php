<?php 
$conn = mysqli_connect("localhost", "root", "", "superhomes");
$result = array();
$message =isset($_POST['message']) ? $_POST['message'] : null;
$from = isset($_POST['from']) ? $_POST['from'] : null;

if(!empty($message) && !empty($from)){
    $insertQuery = "INSERT INTO chat(message, msgFrom)VALUES('$message', '$from')";
    $result['send_status'] = $conn->query($insertQuery);
}

$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$selectQuery = "SELECT * FROM chat WHERE id > " .$start;
$fireSelectQuery = $conn->query($selectQuery);
while($row = mysqli_fetch_array($fireSelectQuery)){
    $result['items'][] = $row;
}
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
echo json_encode($result);
?>
