<?php
include './includes/dp.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch tasks from the tasks table
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display tasks in an unordered list
    while ($row = $result->fetch_assoc()) {
        echo '<li class="list-group-item">';
        echo '<strong>' . $row['task_name'] . '</strong><br>';
        if ($row['due_date']) {
            echo 'Due date: ' . $row['due_date'] . '<br>';
        }
        if ($row['due_time']) {
            echo 'Due time: ' . $row['due_time'] . '<br>';
        }
        echo '<button class="btn btn-danger" onclick="removeTask(this, ' . $row['id'] . ')">Remove</button></li>';
    }
} else {
    echo '<li class="list-group-item">No tasks found</li>';
}

$conn->close();
?>

