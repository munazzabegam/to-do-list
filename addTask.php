<?php
include './includes/dp.php';


$task_name = $_POST['task_name'];
$due_date = $_POST['due_date'];
$due_time = $_POST['due_time'];


$sql = "INSERT INTO tasks (task_name, due_date, due_time) VALUES ('$task_name', '$due_date', '$due_time')";
$conn->query($sql);

$conn->close();
?>
