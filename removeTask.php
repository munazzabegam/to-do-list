<?php

include './includes/dp.php';


$task_id = $_POST['id'];

$sql = "DELETE FROM tasks WHERE id = '$task_id'";
$conn->query($sql);

$conn->close();
?>
