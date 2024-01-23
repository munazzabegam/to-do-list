<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include './includes/dp.php'; // Make sure the path is correct

$result = $conn->query("SELECT * FROM tasks");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple To-Do List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section class="card">
    <div class="container mt-5">
        <h1 class="mb-4">My To-Do List</h1>
        <div class="form-row mb-3">
            <div class="col-md-6 mb-2">
                <input type="text" id="taskInput" class="form-control" placeholder="Add a new task">
            </div>
            <div class="col-md-3 mb-2">
                <input type="date" id="dueDate" class="form-control">
            </div>
            <div class="col-md-3 mb-2">
                <input type="time" id="dueTime" class="form-control">
            </div>
        </div>
        <button class="btn btn-success mb-3" onclick="addTask()">Add Task</button>
        <ul id="taskList" class="list-group">
            <?php
                // Display tasks fetched from the database
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
            ?>
        </ul>
    </div>
    </section>

  <!-- footer session  -->
  <footer style="background-color: rgb(255, 255, 255);" class="text-white text-center py-4">
      <div class="foot">
          <p><span style="color: rgb(240, 206, 138);">Mun</span>azza &#169; 2023</p>
      </div>
      <div class="social-links">
        <a href=""><i class="fa fa-linkedin"></i></a>
        <a href="http://wa.me/+918197458962"><i class="fa fa-whatsapp"></i></a>
        <a href="https://www.instagram.com/_.sh_eh_za_di._/"><i class="fa fa-instagram"></i></a>
        <a href="http://github.com/munazzabegam"><i class="fa fa-github"></i></a>
      </div>
  </footer>

    <script>
        window.onload = function () {
            loadTasks();
        };
    </script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
